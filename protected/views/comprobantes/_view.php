<?php
/* @var $this ComprobantesController */
/* @var $data Comprobantes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_comprobante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_comprobante), array('view', 'id'=>$data->id_comprobante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_comprobante')); ?>:</b>
	<?php echo CHtml::encode($data->num_comprobante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_cheque')); ?>:</b>
	<?php echo CHtml::encode($data->num_cheque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuariosUser->nombres.' '.$data->usuariosUser->apellidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bancos_id_bancos')); ?>:</b>
	<?php echo CHtml::encode($data->bancosIdBancos->nombre); ?>
	<br />

</div>