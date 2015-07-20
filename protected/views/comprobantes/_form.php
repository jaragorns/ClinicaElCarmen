<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comprobantes-form',
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
		<?php echo $form->labelEx($model,'num_comprobante'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'num_comprobante',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'num_comprobante'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'num_cheque'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'num_cheque',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'num_cheque'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'monto'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'fecha'); ?>
	</div>
	<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha',
	                'model'=>$model,
	                'value' => $model->fecha,
<<<<<<< HEAD
	                'language'=> Yii::app()->language,
=======
	                'language'=>'es',
>>>>>>> bd94441a1cc78c0f5250b81086296d467ccd447c
	                'options'=>array (
	                    'showSecond'=>true,
	                    'dateFormat'=>'yy-mm-dd',
	                ),  
	            )   
	        );
		
		?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'detalle'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'detalle',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'Usuario *'); ?>
	</div>
	<div class="media">
		<?php 	
				$model->usuarios_username = Yii::app()->user->getState('nombres').' '.Yii::app()->user->getState('apellidos');
			  	echo $form->textField($model,'usuarios_username' ,array('disabled'=>'true', 'size'=>40, 'maxlength'=>80)); 
			  	$model->usuarios_username = Yii::app()->user->id;
				echo $form->error($model,'usuarios_username'); 
		?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'banco *'); ?>
	</div>
	<div class="media">
		<?php echo $form->dropDownList(
				$model,
				'bancos_id_bancos',
				CHtml::listData(
					Bancos::model()->findAll(),
					'id_bancos',
					'nombre'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione un Banco --',
				)
			);
		?> 
		<?php echo $form->error($model,'bancos_id_bancos'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->