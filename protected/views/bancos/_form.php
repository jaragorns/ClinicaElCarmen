<?php
/* @var $this BancosController */
/* @var $model Bancos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bancos-form',
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
		<?php echo $form->textField($model,'nombre',array('placeholder'=>"Banco de Venezuela" ,'size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'saldo'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'saldo',array('placeholder'=>"100000.00")); ?>
		<?php echo $form->error($model,'saldo'); ?>
	</div>
<!--JsM
	<div class="rowcontact">
		<?php #echo $form->labelEx($model,'fecha_actualizacion'); ?>
		<?php #echo $form->textField($model,'fecha_actualizacion'); ?>
		<?php #echo $form->error($model,'fecha_actualizacion'); ?>
	</div>
JsM-->
	<div class="buttons">
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