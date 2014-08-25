<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="media">
			<?php echo $form->labelEx($model,'username :'); ?>
			<?php echo $form->textField($model,'username',array('placeholder'=>"maria.perez",'size'=>30,'maxlength'=>80)); ?>
			<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="media">
		<?php echo $form->labelEx($model,'password :'); ?>
		<?php echo $form->passwordField($model,'password',array('type'=>"password",'size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="media">
		<?php echo $form->labelEx($model,'cargo :'); ?>
		<?php echo $form->textField($model,'cargo',array('placeholder'=>"Enfermera",'size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'cargo'); ?>
	</div>

	<div class="media">
		<?php echo $form->labelEx($model,'nombres :'); ?>
		<?php echo $form->textField($model,'nombres',array('placeholder'=>"Maria",'size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nombres'); ?>
	</div>

	<div class="media">
		<?php echo $form->labelEx($model,'apellidos :'); ?>
		<?php echo $form->textField($model,'apellidos',array('placeholder'=>"Perez",'size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'apellidos'); ?>
	</div>

	<div class="media">
		<?php echo $form->labelEx($model,'telefono :'); ?>
		<?php echo $form->textField($model,'telefono',array('placeholder'=>"04247801122",'size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="media">
		<?php echo $form->labelEx($model,'email :'); ?>
		<?php echo $form->textField($model,'email',array('placeholder'=>"mariaperez@gmail.com",'size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="media">
		<?php echo $form->labelEx($model,'Rol : '); ?>
		<?php echo $form->dropDownList(
				$model,
				'roles_id',
				CHtml::listData(
					Roles::model()->findAll(),
					'id',
					'description'),
				array(
					'class' => 'my-drop-down',
					'options' => array(
						'2' => array(
							'selected' => "selected"
						)
					)
				)
			);
		?> 
		<?php echo $form->error($model,'roles_id'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->