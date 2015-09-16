<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solicitudes-form',
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
		<?php echo $form->labelEx($model,'estacion_id_estacion'); ?>
	</div>
	<div class="media">
		<?php 
			$sql2 = 'SELECT * FROM Estaciones WHERE id_estacion NOT IN ("1","7")  '; 
			echo $form->dropDownList($model,'estacion_id_estacion',
			CHtml::listData(
				Estaciones::model()->findAllBySql($sql2),'id_estacion','nombre'),	array('class' => 'my-drop-down','prompt'=>'Seleccionar:',)); ?> 
		<?php echo $form->error($model,'estacion_id_estacion'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'stock_id_stock'); ?>
	</div>
	<div class="media">
		<?php 
			echo $form->hiddenField($model,'stock_id_stock',array());
			$medicamento=""; 

			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'nombre_1',
				'value'=>$medicamento,
				'model'=>$model,
				'source'=>$this->createUrl('Solicitudes/Autocomplete'),
				// additional javascript options for the autocomplete plugin
				'options'=>array(
					'minLength'=>'1',
        			'showAnim'=>'fold',
        			'select'=>"js:function(event, ui) { 
							$('#Solicitudes_stock_id_stock').val(ui.item.stock_id_stock); 
						}"
				),
				'htmlOptions'=>array(
					'style'=>'width:350px;',
					'placeholder'=>'Nombre del medicamento...',
					'title'=>'Indique el medicamento que desea solicitar.'
				),
			));
		?>
		<?php echo $form->error($model,'stock_id_stock'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'cantidad'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'cantidad',array('size'=>10,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'usuarios'); ?>
	</div>
	<div class="media">
		<?php 
			$deGuardia = $this->verificarGuardia();
			$sql = "SELECT * FROM usuarios WHERE id=".$deGuardia->id_usuario; 
			$responsable = Usuarios::model()->findBySql($sql);
			echo $responsable->NombreCompleto. " - ";
			echo $form->hiddenField($model,'usuarios',array("value"=>$deGuardia->id_usuario));				
			$sql="SELECT nombre FROM estaciones WHERE id_estacion=".$deGuardia->id_estacion; 
			$nomEstacion = Estaciones::model()->findBySql($sql);
			?><b><?php echo "(".$nomEstacion->nombre.")";  ?></b> 
			<?php 
			
		?>
	</div>

	<div class="media">
		<?php echo $form->hiddenField($model,'guardias_id_guardia',array("value"=>$deGuardia->id_guardia)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
