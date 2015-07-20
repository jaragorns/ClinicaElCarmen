<?php
/* @var $this EstacionesController */
/* @var $data Estaciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_estacion), array('view', 'id'=>$data->id_estacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>