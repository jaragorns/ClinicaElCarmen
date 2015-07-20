<?php
/* @var $this FacturasController */
/* @var $model Facturas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-form',
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
		<?php echo $form->labelEx($model,'num_factura'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'num_factura',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'num_factura'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'fecha'); ?>
	</div>
	<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha',
	                'model'=>$model,
	                'value' => $model->fecha,
	                'language'=>'es',
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
		<?php echo $form->labelEx($model,'monto'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_proveedor'); ?>
	</div>
	<div class="media">
		<?php echo $form->dropDownList(
				$model,
				'id_proveedor',
				CHtml::listData(
					Proveedores::model()->findAll(),
					'id_proveedor',
					'nombre'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione un Proveedor --',
				)
			);
		?> 
		<?php echo $form->error($model,'id_proveedor'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->