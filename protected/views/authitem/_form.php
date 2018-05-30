<?php
/* @var $this AuthitemController */
/* @var $model Authitem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'authitem-form',
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
		<?php echo $form->labelEx($model,'name: *'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'name',array('placeholder'=>"accionista",'size'=>30,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'tipo: '); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'type',array('placeholder'=>"2,1,0;",'size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'descripción: '); ?>
	</div>
	<div class="media">
		<?php echo $form->textArea($model,'description',array('placeholder'=>"NULL;",'rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'bizrule: '); ?>
	</div>
	<div class="media">
		<?php echo $form->textArea($model,'bizrule',array('placeholder'=>"NULL;",'rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bizrule'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'data: '); ?>
	</div>
	<div class="media">
		<?php echo $form->textArea($model,'data',array('placeholder'=>"NULL;",'rows'=>2, 'cols'=>50));?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="media">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(){
	    $('input[type=text]').keyup(function(){
	        $(this).val($(this).val().toUpperCase());
	    });
	});
</script>