<?php
/* @var $this BitacoraDescargasController */
/* @var $model BitacoraDescargas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_bitacora'); ?>
		<?php echo $form->textField($model,'id_bitacora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_hora'); ?>
		<?php echo $form->textField($model,'fecha_hora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_stock'); ?>
		<?php echo $form->textField($model,'id_stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_guardia'); ?>
		<?php echo $form->textField($model,'id_guardia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->