<?php
/* @var $this BancosController */
/* @var $model Bancos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<!--
	<div class="rowcontact">
		<?php #echo $form->label($model,'id_bancos'); ?>
	</div>
	<div class="media">
		<?php #echo $form->textField($model,'id_bancos'); ?>
	</div>
	-->
	<div class="rowcontact">
		<?php echo $form->label($model,'nombre'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'saldo'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'saldo'); ?>
	</div>
<!--
	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_actualizacion'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'fecha_actualizacion'); ?>
		$criteria->compare('fecha_actualizacion',Yii::app()->dateFormatter->formatDateTime($this->fecha_actualizacion, 'short'),true);
	</div>
-->
	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->



 