<?php
/* @var $this TurnosController */
/* @var $data Turnos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_turno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_turno), array('view', 'id'=>$data->id_turno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abreviatura')); ?>:</b>
	<?php echo CHtml::encode($data->abreviatura); ?>
	<br />


</div>