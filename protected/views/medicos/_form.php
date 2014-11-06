<?php
/* @var $this MedicosController */
/* @var $model Medicos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'medicos-form',
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
<!--
	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_medico'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'id_medico'); ?>
		<?php echo $form->error($model,'id_medico'); ?>
	</div>
-->
	<div class="rowcontact">
		<?php echo $form->labelEx($model,'nombre_completo'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'nombre_completo',array('placeholder'=>"Dr. Carlos Medina Castillo",'size'=>40,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'nombre_completo'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'cedula'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'cedula',array('placeholder'=>"1.302.240",'size'=>11,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cedula'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'especialidad'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'especialidad',array('placeholder'=>"Gineco-Obstetra",'size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'especialidad'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'rif'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'rif',array('placeholder'=>"V-01302240-8",'size'=>13,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'rif'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'consulta'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'consulta',array('placeholder'=>"Lunes - Jueves",'size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'consulta'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->