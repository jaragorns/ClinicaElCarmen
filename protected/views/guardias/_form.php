<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guardias-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Todos los campos son requeridos.</p>

	<?php if($form->errorSummary($model)!=""){ ?>
	<div class="alert alert-info">
    	<strong><?php echo $form->errorSummary($model);?></strong> 
    </div>
	<?php } ?>

		<div class="rowcontact">
		<label>Fecha</label>
	</div>
	<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha',
	                'model'=>$model,
	                'value' => $model->fecha,
	                'language'=> Yii::app()->language,
	                'options'=>array (
	                    'showSecond'=>true,
	                    'dateFormat'=>'yy-mm-dd',
	                ),  
	            )   
	        );
		
		?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>
	<div class="rowcontact">
		<label>Enfermera</label>
	</div>
	<div class="media">
		<?php
			$models=Usuarios::model()->findAll(array(
				'select'=>'id,apellidos,nombres',
				'condition'=>'cargo="Enfermera"',
				'order'=>'apellidos'
			));  
			$list = CHtml::listData($models,'id', 'NombreCompleto');
			echo CHtml::dropDownList('id_usuario', $model, $list, array('empty' => 'Enfermera', 'class'=>"select_guardia"));
		?>
		<input type="hidden" name="id_usuario" value="11">
	</div>
	<div class="rowcontact">
		<label>Servicio</label>
	</div>
	<div class="media">
		<?php
			$models=Estaciones::model()->findAll(array(
					'select'=>'id_estacion,nombre'
				));  
				$list = CHtml::listData($models,'id_estacion', 'nombre');
				echo CHtml::dropDownList('id_estacion', $model, $list, array('empty' => 'Servicio', 'class'=>"select_guardia"));

		?>
	</div>
	<div class="rowcontact">
		<label>Turno</label>
	</div>
	<div class="media">
		<?php
			$models=Turnos::model()->findAll(array(
					'select'=>'id_turno, abreviatura',
					'condition'=>'descripcion != "" '
				));  
				$list = CHtml::listData($models,'id_turno', 'abreviatura');
				echo CHtml::dropDownList('id_turno', $model, $list, array('empty' => 'Turno', 'class'=>"select_guardia"));
			?> 
	</div>


	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
