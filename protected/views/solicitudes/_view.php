<?php
/* @var $this SolicitudesController */
/* @var $data Solicitudes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_solicitud')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_solicitud), array('view', 'id'=>$data->id_solicitud)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_solicitud')); ?>:</b>
	<?php echo CHtml::encode(date_format(date_create($data->fecha_solicitud),'d-m-Y')); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estacion_id_estacion')); ?>:</b>
	<?php echo CHtml::encode($data->estacionIdEstacion->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarios')); ?>:</b>
	<?php echo CHtml::encode(Usuarios::model()->findByAttributes(array('id'=>$data->usuarios))->NombreCompleto.' ('.
	Estaciones::model()->findByAttributes(array('id_estacion'=>Guardias::model()->findByAttributes(array('id_guardia'=>$data->guardias_id_guardia))->id_estacion))->nombre
	  .')	'
	); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo strtr($data->estado, array("0" => "Pendiente","1" => "En Proceso","2" => "Procesada")); ?>
	<br />

</div>