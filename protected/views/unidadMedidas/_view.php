<?php
/* @var $this UnidadMedidasController */
/* @var $data UnidadMedidas */
?>

<div class="view">
	<!--
	<b><?php //echo CHtml::encode($data->getAttributeLabel('id_unidad_medidas')); ?>:</b>
	<?php //echo CHtml::link(CHtml::encode($data->id_unidad_medidas), array('view', 'id'=>$data->id_unidad_medidas)); ?>
	<br />
	-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abreviatura')); ?>:</b>
	<?php echo CHtml::encode($data->abreviatura); ?>
	<br />


</div>