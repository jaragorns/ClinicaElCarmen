<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_comprobante'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'id_comprobante'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'num_comprobante'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'num_comprobante',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'num_cheque'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'num_cheque',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'monto'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'monto'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'fecha'); ?>
	</div>
<!--
	<div class="rowcontact">
		<?php //echo $form->label($model,'detalle'); ?>
	</div>
	<div class="media">
		<?php //echo $form->textField($model,'detalle',array('size'=>60,'maxlength'=>80)); ?>
	</div>
	<div class="rowcontact">
		<?php //echo $form->label($model,'usuarios_username'); ?>
	</div>
	<div class="media">
		<?php //echo $form->textField($model,'usuarios_username'); ?>
	</div>
-->
	<div class="rowcontact">
		<?php echo $form->label($model,'bancos_id_bancos'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'bancos_id_bancos'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->