<?php
/* @var $this FacturasController */
/* @var $data Facturas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_factura')); ?>:</b>
	<?php echo CHtml::encode($data->num_factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_factura')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proveedor')); ?>:</b>
	<?php echo CHtml::encode(Proveedores::model()->findByAttributes(array('id_proveedor'=>$data->id_proveedor))->nombre); ?>
	<br />

</div>