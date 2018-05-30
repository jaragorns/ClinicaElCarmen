<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proveedores-form',
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
		<?php echo $form->labelEx($model,'nombre'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'nombre',array('placeholder'=>"Clínica El Carmen C.A.",'size'=>45,'maxlength'=>45, 'class'=>'uppercase')); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'rif'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'rif',array('placeholder'=>"J090017461",'size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rif'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'telefono'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'telefono',array('placeholder'=>"02772917765",'size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'direccion'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'direccion',array('placeholder'=>"Carrera 6, #6-56, San Juan de Colón",'size'=>45,'maxlength'=>45, 'class'=>'uppercase')); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'email'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'email',array('placeholder'=>"clinicarmen@gmail.com",'size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(){
	    $('.uppercase').keyup(function(){
	        $(this).val($(this).val().toUpperCase());
	    });
	});
</script>