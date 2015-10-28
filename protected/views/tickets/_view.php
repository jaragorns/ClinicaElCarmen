<?php
/* @var $this TicketsController */
/* @var $data Tickets */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ticket')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ticket), array('view', 'id'=>$data->id_ticket)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_medicamento')); ?>:</b>
	<?php echo CHtml::encode($data->id_medicamento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bitacora_descargas_id_bitacora')); ?>:</b>
	<?php echo CHtml::encode($data->bitacora_descargas_id_bitacora); ?>
	<br />


</div>