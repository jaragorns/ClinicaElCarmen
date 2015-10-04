<?php
/* @var $this BitacoraStockController */
/* @var $model BitacoraStock */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bitacora-stock-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_estacion_origen'); ?>
		<?php echo $form->textField($model,'id_estacion_origen'); ?>
		<?php echo $form->error($model,'id_estacion_origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_estacion_destino'); ?>
		<?php echo $form->textField($model,'id_estacion_destino'); ?>
		<?php echo $form->error($model,'id_estacion_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_medicamento'); ?>
		<?php echo $form->textField($model,'id_medicamento'); ?>
		<?php echo $form->error($model,'id_medicamento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->