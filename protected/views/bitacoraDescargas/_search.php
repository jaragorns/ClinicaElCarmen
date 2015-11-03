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

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_hora'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'fecha_hora',array('placeholder'=>"2015-10-25 22:02",'size'=>30,'maxlength'=>17)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'cantidad'); ?>
	</div>
	<div class="media">
		<?php  echo $form->numberField($model,'cantidad',array('min'=>0, 'max'=>999999)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'estado'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'estado'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_stock'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'id_stock'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_guardia'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'id_guardia'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->