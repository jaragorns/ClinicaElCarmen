<?php
/* @var $this BitacoraStockController */
/* @var $data BitacoraStock */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bitacora_stock')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bitacora_stock), array('view', 'id'=>$data->id_bitacora_stock)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estacion_origen')); ?>:</b>
	<?php echo CHtml::encode($data->id_estacion_origen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estacion_destino')); ?>:</b>
	<?php echo CHtml::encode($data->id_estacion_destino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_medicamento')); ?>:</b>
	<?php echo CHtml::encode($data->id_medicamento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>