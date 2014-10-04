<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'id'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'username'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>80)); ?>
	</div>
<!--
	<div class="rowcontact">
		<?php echo $form->label($model,'password'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'password',array('size'=>30,'maxlength'=>80)); ?>
	</div>
-->
	<div class="rowcontact">
		<?php echo $form->label($model,'cargo'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'cargo',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'nombres'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'nombres',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'apellidos'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'apellidos',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'telefono'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'telefono',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'email'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
	</div>
<!--
	<div class="rowcontact">
		<?php // echo $form->labelEx($model,'Rol '); ?>
	</div>
	<div class="media">
		<?php 		
			/*
			echo $form->dropDownList(
				$rol_user,
				'[1]itemname',
				CHtml::listData(
					Authassignment::model()->findAll(),
					'userid',
					'itemname'),
				array(
					'class' => 'my-drop-down',
					'options' => array(
						'1' => array(
							'selected' => "selected"
						)
					)
				)
			);
			*/
		?> 
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->