<?php
/* @var $this VacacionesController */
/* @var $data Vacaciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vacaciones')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_vacaciones), array('view', 'id'=>$data->id_vacaciones)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario->NombreCompleto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

</div>