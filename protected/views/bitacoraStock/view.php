<?php
/* @var $this BitacoraStockController */
/* @var $model BitacoraStock */

$this->breadcrumbs=array(
	'Bitacora Stocks'=>array('index'),
	$model->id_bitacora_stock,
);

$this->menu=array(
	array('label'=>'List BitacoraStock', 'url'=>array('index')),
	array('label'=>'Create BitacoraStock', 'url'=>array('create')),
	array('label'=>'Update BitacoraStock', 'url'=>array('update', 'id'=>$model->id_bitacora_stock)),
	array('label'=>'Delete BitacoraStock', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bitacora_stock),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BitacoraStock', 'url'=>array('admin')),
);
?>

<h1>View BitacoraStock #<?php echo $model->id_bitacora_stock; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_bitacora_stock',
		'id_usuario',
		'id_estacion_origen',
		'id_estacion_destino',
		'id_medicamento',
		'cantidad',
		'fecha',
	),
)); ?>
