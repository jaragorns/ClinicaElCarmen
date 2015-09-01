<?php
/* @var $this MedicamentosController */
/* @var $data Medicamentos */
?>

<div class="view">
	<!--
	<b><?php //echo CHtml::encode($data->getAttributeLabel('id_medicamento')); ?>:</b>
	<?php //echo CHtml::link(CHtml::encode($data->id_medicamento), array('view', 'id'=>$data->id_medicamento)); ?>
	<br />
	-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('componente')); ?>:</b>
	<?php echo CHtml::encode($data->componente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_medida')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_medida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_contado')); ?>:</b>
	<?php echo CHtml::encode($data->precio_contado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_seguro')); ?>:</b>
	<?php echo CHtml::encode($data->precio_seguro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iva')); ?>:</b>
	<?php echo CHtml::encode($data->iva); ?>
	<br />


</div>