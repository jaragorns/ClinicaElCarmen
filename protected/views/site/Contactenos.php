<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contáctenos';
$this->breadcrumbs=array(
	'Contáctenos',
);
?>

<h1>Contáctenos</h1>

<?php if(Yii::app()->user->hasFlash('contactenos')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contactenos'); ?>
</div>

<?php else: ?>

<p>
Si tiene alguna consulta o pregunta, por favor, rellene el siguiente formulario para contactarse con nosotros. Gracias.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Todos los campos son requeridos.</p>

	<?php echo $form->errorSummary($model,null,null,array("class"=>"alert alert-error")); ?>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'nombre:'); ?>
	</div>
	<div class="media">
			<?php echo $form->textField($model,'name'); ?>
			<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'email:'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'asunto:'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'cuerpo:'); ?>
	</div>
	<div class="media">
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="media">
		<?php echo $form->labelEx($model,Yii::t('app','verifyCode')); ?>
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

	<div class="media">
		<?php echo CHtml::submitButton('Enviar', array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>