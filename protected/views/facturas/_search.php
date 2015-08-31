<?php
/* @var $this FacturasController */
/* @var $model Facturas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<!--
	<div class="rowcontact">
		<?php //echo $form->label($model,'id_factura'); ?>
	</div>
	<div class="media">
		<?php //echo $form->textField($model,'id_factura'); ?>
	</div>
	-->
	<div class="rowcontact">
		<?php echo $form->label($model,'num_factura'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'num_factura',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_factura'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'fecha_factura',array('placeholder'=>'YYYY-MM-DD')); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_entrada'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'fecha_entrada',array('placeholder'=>'YYYY-MM-DD')); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_vencimiento'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'fecha_vencimiento',array('placeholder'=>'YYYY-MM-DD')); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'monto'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'monto'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_proveedor'); ?>
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
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->