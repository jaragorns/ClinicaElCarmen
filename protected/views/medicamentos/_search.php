<?php
/* @var $this MedicamentosController */
/* @var $model Medicamentos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<!--
	<div class="rowcontact">
		<?php //echo $form->label($model,'id_medicamento'); ?>
		<?php //echo $form->textField($model,'id_medicamento'); ?>
	</div>
	-->
	<div class="rowcontact">
		<?php echo $form->label($model,'nombre'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'componente'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'componente',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'unidad_medida'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'unidad_medida',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'precio_contado'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'precio_contado',array('size'=>20,'maxlength'=>10)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'precio_seguro'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'precio_seguro',array('size'=>20,'maxlength'=>10)); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->