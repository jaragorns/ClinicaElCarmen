<?php
/* @var $this MedicosController */
/* @var $model Medicos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'nombre_completo'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'nombre_completo',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'cedula'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'cedula'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'especialidad'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'especialidad',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'consulta'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'consulta',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->