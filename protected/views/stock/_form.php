<?php
/* @var $this StockController */
/* @var $model Stock */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-form',
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
		<?php echo $form->labelEx($model,'cantidad'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_estacion'); ?>
	</div>
	<div class="media">
		<?php 	
			$model->id_estacion = Estaciones::model()->findByAttributes(array('id_estacion'=>"6"))->nombre;
			echo $form->textField($model, 'id_estacion' ,array('disabled'=>'true', 'size'=>30, 'maxlength'=>80)); 
			echo $form->error($model,'id_estacion'); 
		?>
		<?php echo $form->error($model,'id_estacion'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_medicamento'); ?>
	</div>
	<div class="media">
		<?php 
		//$consulta = "SELECT * FROM Inventario WHERE num_factura = $model->num_factura	AND id_proveedor = $model->id_proveedor";
   			
			//Medicamentos::model()->findAllBySql($consulta);
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

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->