<?php
/* @var $this SolicitudesController */
/* @var $data Solicitudes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_solicitud')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_solicitud), array('view', 'id'=>$data->id_solicitud)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estacion_id_estacion')); ?>:</b>
	<?php echo CHtml::encode($data->estacion_id_estacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarios')); ?>:</b>
	<?php echo CHtml::encode($data->usuarios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stock_id_stock')); ?>:</b>
	<?php echo CHtml::encode($data->stock_id_stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guardias_id_guardia')); ?>:</b>
	<?php echo CHtml::encode($data->guardias_id_guardia); ?>
	<br />


</div>