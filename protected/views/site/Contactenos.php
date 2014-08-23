<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contactenos';
$this->breadcrumbs=array(
	'Contactenos',
);
?>

<h1>Contactenos</h1>

<?php if(Yii::app()->user->hasFlash('contactenos')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contactenos'); ?>
</div>

<?php else: ?>

<p>
Si tiene alguna consulta o preguntas, por favor, rellene el siguiente formulario para contactarse con nosotros. Gracias.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model,null,null,array("class"=>"alert alert-error")); ?>

	<div>
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre'); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'asunto'); ?>
		<?php echo $form->textField($model,'asunto',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'asunto'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'cuerpo'); ?>
		<?php echo $form->textArea($model,'cuerpo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cuerpo'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div>
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">
			Por favor introduzca las letras tal como se muestran en la imagen de arriba.<br/>
			Las letras no distinguen entre mayúsculas y minúsculas.<br/><br/>
		</div>
	</div>
	<?php endif; ?>

	<div class="buttons">
		<?php echo CHtml::submitButton('Enviar', array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>