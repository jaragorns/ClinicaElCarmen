<?php
/* @var $this UnidadMedidasController */
/* @var $model UnidadMedidas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'descripcion'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'abreviatura'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'abreviatura',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
