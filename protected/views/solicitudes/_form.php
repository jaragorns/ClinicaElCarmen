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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'estacion_id_estacion'); ?>
		<?php echo $form->textField($model,'estacion_id_estacion'); ?>
		<?php echo $form->error($model,'estacion_id_estacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuarios'); ?>
		<?php echo $form->textField($model,'usuarios',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'usuarios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stock_id_stock'); ?>
		<?php echo $form->textField($model,'stock_id_stock'); ?>
		<?php echo $form->error($model,'stock_id_stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guardias_id_guardia'); ?>
		<?php echo $form->textField($model,'guardias_id_guardia'); ?>
		<?php echo $form->error($model,'guardias_id_guardia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->