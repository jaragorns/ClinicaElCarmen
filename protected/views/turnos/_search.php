<?php
/* @var $this TurnosController */
/* @var $model Turnos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_turno'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'id_turno'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'descripcion'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'descripcion',array('size'=>45,'maxlength'=>45)); ?>
	</div>
	
	<div class="rowcontact">
		<?php echo $form->label($model,'abreviatura'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'abreviatura',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->