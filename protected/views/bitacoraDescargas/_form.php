<?php
/* @var $this BitacoraDescargasController */
/* @var $model BitacoraDescargas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bitacora-descargas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php if($form->errorSummary($model)!=""){ ?>
	<div class="alert alert-info">
    	<strong><?php echo $form->errorSummary($model);?></strong> 
    </div>
	<?php } ?>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'cantidad'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'estado'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'estado'); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_stock'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'id_stock'); ?>
		<?php echo $form->error($model,'id_stock'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_guardia'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'id_guardia'); ?>
		<?php echo $form->error($model,'id_guardia'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->