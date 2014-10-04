<?php
/* @var $this BancosController */
/* @var $data Bancos */

?>


<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bancos')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bancos), array('view', 'id'=>$data->id_bancos)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('saldo')); ?>:</b>
	<?php echo CHtml::encode($data->saldo).' '.'Bs'; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_actualizacion')); ?>:</b>
	<?php echo Yii::app()->dateFormatter->formatDateTime($data->fecha_actualizacion, 'short'); ?>
	<?php //echo Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($data->fecha_actualizacion, 'yyyy-MM-dd HH:ii:ss'),'medium',null); //Opc2 ?>
	<br />


</div>