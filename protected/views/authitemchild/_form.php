<?php
/* @var $this AuthitemchildController */
/* @var $model Authitemchild */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'authitemchild-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'parent'); ?>
	</div>
	<div class="media">
		<?php echo $form->dropDownList(
				$model,
				'parent',
				CHtml::listData(
					$roles=Authitem::model()->findAll(),
					'name',
					'name'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione un Rol --',
					'options' => array(
						'2' => array(
							'selected' => "selected"
						)
					)
				)
			);
		?> 
		<?php echo $form->error($model,'parent'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'child'); ?>
	</div>
	<div class="media">
		<?php echo $form->dropDownList(
				$model,
				'child',
				CHtml::listData(
					$roles=Authitem::model()->findAll(),
					'name',
					'name'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione un Rol --',
					'options' => array(
						'2' => array(
							'selected' => "selected"
						)
					)
				)
			);
		?> 
		<?php echo $form->error($model,'child'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->