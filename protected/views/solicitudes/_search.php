<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_solicitud'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'fecha_solicitud',array('placeholder'=>'YYYY-MM-DD')); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'estacion_id_estacion'); ?>
	</div>
	<div class="media">
		<?php 
			$sql2 = 'SELECT * FROM Estaciones WHERE id_estacion NOT IN ("1","7")'; 
			echo $form->dropDownList($model,'estacion_id_estacion',
			CHtml::listData(
				Estaciones::model()->findAllBySql($sql2),'id_estacion','nombre'),	array('class' => 'my-drop-down','prompt'=>'Seleccionar:',)); ?> 
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'usuarios'); ?>
	</div>
	<div class="media">
		<?php echo $form->dropDownList($model,'usuarios',
				CHtml::listData(
					Usuarios::model()->findAll(array('condition'=>'itemname=:itemname','params'=>array(':itemname'=>'Enfermeria'))),
					'id','NombreCompleto'),	array('class' => 'my-drop-down','prompt'=>'Enfermera:',)); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->