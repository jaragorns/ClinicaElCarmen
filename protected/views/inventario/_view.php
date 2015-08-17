<?php
/* @var $this InventarioController */
/* @var $data Inventario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_factura')); ?>:</b>
	<?php echo CHtml::encode(Facturas::model()->findByAttributes(array('id_factura'=>$data->id_factura))->num_factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_medicamento')); ?>:</b>
	<?php echo CHtml::encode(Medicamentos::model()->findByAttributes(array('id_medicamento'=>$data->id_medicamento))->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_compra')); ?>:</b>
	<?php echo CHtml::encode($data->precio_compra); ?>
	<br />

</div>