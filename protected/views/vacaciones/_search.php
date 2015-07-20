<?php
/* @var $this VacacionesController */
/* @var $model Vacaciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_usuario'); ?>
	</div>
	<div class="media">
		<?php 
			echo $form->dropDownList(
				$model,
				'id_usuario',
				CHtml::listData(
					Usuarios::model()->findAll(),
					'id',
					'NombreCompleto'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione un Empleado --',
				)
			);
		?> 
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_inicio'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'fecha_inicio',array('placeholder'=>"2015-10-25",'size'=>30,'maxlength'=>12)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_fin'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'fecha_fin',array('placeholder'=>"2015-10-25",'size'=>30,'maxlength'=>12)); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->