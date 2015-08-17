<?php
/* @var $this InventarioController */
/* @var $model Inventario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventario-form',
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
	<?php echo $form->errorSummary($model); ?>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'cantidad'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'precio_compra'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'precio_compra',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'precio_compra'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_factura'); ?>
	</div>
	<div class="media">
		<?php 
			$model->id_factura = $model_factura->num_factura;
			echo $form->textField($model,'id_factura',array('disabled'=>'true'));
			echo $form->error($model,'id_factura'); 
		?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
	</div>
	<div class="media">
		<?php 	
			$model->id_usuario = Yii::app()->user->getState('nombres').' '.Yii::app()->user->getState('apellidos');
			echo $form->textField($model, 'id_usuario' ,array('disabled'=>'true', 'size'=>30, 'maxlength'=>80)); 
			echo $form->error($model,'id_usuario'); 
		?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_medicamento'); ?>
	</div>
	<div class="media">
		<?php 
			echo $form->dropDownList(
				$model,
				'id_medicamento',
				CHtml::listData(
					Medicamentos::model()->findAll(),
					'id_medicamento',
					'nombre'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione un Medicamento --',
				)
			);
		?> 
		<?php echo $form->error($model,'id_medicamento'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_estacion'); ?>
	</div>
	<div class="media">
		<?php 	
			$model->id_estacion = Estaciones::model()->findByAttributes(array('id_estacion'=>"7"))->nombre;
			echo $form->textField($model, 'id_estacion' ,array('disabled'=>'true', 'size'=>30, 'maxlength'=>80)); 
			echo $form->error($model,'id_estacion'); 
		?>
		<?php echo $form->error($model,'id_estacion'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->