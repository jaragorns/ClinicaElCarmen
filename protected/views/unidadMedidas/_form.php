<?php
/* @var $this UnidadMedidasController */
/* @var $model UnidadMedidas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'unidad-medidas-form',
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
		<?php echo $form->labelEx($model,'descripcion'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'descripcion',array('placeholder'=>'Miligramo','size'=>60,'maxlength'=>80, 'class'=>'uppercase')); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'abreviatura'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'abreviatura',array('placeholder'=>'mg','size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'abreviatura'); ?>
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
