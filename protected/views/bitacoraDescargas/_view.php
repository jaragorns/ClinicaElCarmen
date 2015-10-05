<?php
/* @var $this BitacoraDescargasController */
/* @var $data BitacoraDescargas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bitacora')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bitacora), array('view', 'id'=>$data->id_bitacora)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_hora')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_stock')); ?>:</b>
	<?php echo CHtml::encode($data->id_stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_guardia')); ?>:</b>
	<?php echo CHtml::encode($data->id_guardia); ?>
	<br />


</div>