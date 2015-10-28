<?php
/* @var $this TicketsController */
/* @var $model Tickets */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tickets-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php if($form->errorSummary($model)!=""){ ?>
	<div class="alert alert-info">
    	<strong><?php echo $form->errorSummary($model);?></strong> 
    </div>
	<?php } ?>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_medicamento'); ?>
	</div>
	<div class="media">
		<?php
			echo $form->hiddenField($model,'id_medicamento',array());
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'id_medicamento',
			    'value'=>'',
			    'model'=>$model,
			    'source'=>$this->createUrl('Stock/Autocomplete'),
			    // additional javascript options for the autocomplete plugin
			    'options'=>array(
			    	'minLength'=>'1',
			    	'showAnim'=>'fold',
			    	'select'=>"js:function(event, ui) { 
	       				$('#Tickets_id_medicamento').val(ui.item.id_medicamento); 
	       			}"
			    ),
			    'htmlOptions'=>array(
		        	'style'=>'width:436px;',
		        	'placeholder'=>'Nombre del medicamento...',
		        	'title'=>'Indique el medicamento que desea buscar.'
	    		),
			));
		?>
		<?php echo $form->error($model,'id_medicamento'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'cantidad'); ?>
	</div>
	<div class="media">
		<?php echo $form->numberField($model,'cantidad',array('min'=>0, 'max'=>999999)); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'bitacora_descargas_id_bitacora'); ?>
	</div>
	<div class="media">
		<?php 
		if(!empty(SolicitudesController::verificarGuardia()->id_guardia)){
			$bitacora_descargas = BitacoraDescargas::model()->findByAttributes(array("id_guardia"=>SolicitudesController::verificarGuardia()->id_guardia));

			if(empty($bitacora_descargas)){
				echo "Debe realizar al menos una descarga, para generar un ticket.";
			}else{
				if(strtotime(date("G:i")) > strtotime("00:00") && strtotime(date("G:i")) < strtotime("07:00")){
					//LA GUARDIA QUE CONTEMPLA EMPIEZA ANTES DE LAS 12AM Y TERMINA DESPUES DE LAS 12AM
					//DEBO TRAER LAS DESCARGAS DEL DIA ANTERIOR EN SU GUARDIA Y LAS DESCARGAS DEL DIA ACTUAL 
					$data = BitacoraDescargas::model()->findAllBySql('SELECT * FROM `bitacora_descargas` WHERE `id_guardia` = '.SolicitudesController::verificarGuardia()->id_guardia.' AND `estado`= 1
																		AND DATE_FORMAT(`fecha_hora`,"%Y-%m-%d") = DATE_FORMAT(now()- INTERVAL 1 DAY,"%Y-%m-%d") 
																		OR DATE_FORMAT(`fecha_hora`,"%Y-%m-%d") = DATE_FORMAT(now(),"%Y-%m-%d")');
				}else{
					$data = BitacoraDescargas::model()->findAllBySql('SELECT * FROM `bitacora_descargas` WHERE `id_guardia` = '.SolicitudesController::verificarGuardia()->id_guardia.' AND DATE_FORMAT(`fecha_hora`,"%Y-%m-%d") = DATE_FORMAT(now(),"%Y-%m-%d") AND `estado`= 1');
				}
				echo $form->dropDownList(
					$model,
					'bitacora_descargas_id_bitacora',
					CHtml::listData(
						$data,
						'id_bitacora',
						'StockInformation'),
					array(
						'class' => 'my-drop-down',
						'empty'=>'-- Seleccione la Descarga Realizada --',
					)
				);
			}
		}else{
			echo "Debe estar de guardia para generar tickets.";
		}
		?>
		<?php echo $form->error($model,'bitacora_descargas_id_bitacora'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->