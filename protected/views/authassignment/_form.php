<?php
/* @var $this AuthassignmentController */
/* @var $model Authassignment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'authassignment-form',
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
		<?php echo $form->labelEx($model,'itemname: *'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'itemname',array('placeholder'=>"accionista",'size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'itemname'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'userid: *'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'userid',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'userid'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'bizrule:'); ?>
	</div>
	<div class="media">
		<?php echo $form->textArea($model,'bizrule',array('placeholder'=>"NULL;",'rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bizrule'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'data:'); ?>
	</div>
	<div class="media">
		<?php echo $form->textArea($model,'data',array('placeholder'=>"NULL;",'rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="media">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : 'Save',  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->