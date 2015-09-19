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

	<b><?php echo CHtml::encode($data->getAttributeLabel('stock_id_stock')); ?>:</b>
	<?php echo CHtml::encode(Medicamentos::model()->findByAttributes(array('id_medicamento'=>$data->stockIdStock->id_medicamento))->nombre ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarios')); ?>:</b>
	<?php echo CHtml::encode(Usuarios::model()->findByAttributes(array('id'=>$data->usuarios))->NombreCompleto.' ('.
	Estaciones::model()->findByAttributes(array('id_estacion'=>Guardias::model()->findByAttributes(array('id_guardia'=>$data->guardias_id_guardia))->id_estacion))->nombre
	  .')	'
	); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode(strtr($data->estado, array("0" => "Pendiente","1" => "Asignado","2" => "Rechazado"))); ?>
	<br />

</div>