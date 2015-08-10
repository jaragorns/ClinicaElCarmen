<?php
/* @var $this StockController */
/* @var $data Stock */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estacion')); ?>:</b>
	<?php echo CHtml::encode(Estaciones::model()->findByAttributes(array('id_estacion'=>$data->id_estacion))->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_medicamento')); ?>:</b>
	<?php echo CHtml::encode(Medicamentos::model()->findByAttributes(array('id_medicamento'=>$data->id_medicamento))->nombre); ?>
	<br />


</div>