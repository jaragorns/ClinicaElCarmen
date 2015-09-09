<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_solicitud'); ?>
		<?php echo $form->textField($model,'id_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estacion_id_estacion'); ?>
		<?php echo $form->textField($model,'estacion_id_estacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuarios'); ?>
		<?php echo $form->textField($model,'usuarios',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stock_id_stock'); ?>
		<?php echo $form->textField($model,'stock_id_stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guardias_id_guardia'); ?>
		<?php echo $form->textField($model,'guardias_id_guardia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->