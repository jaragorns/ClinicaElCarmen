<?php
/* @var $this StockController */
/* @var $model Stock */

$this->breadcrumbs=array(
	'Stocks'=>array('index'),
	$model->id_stock,
);

$this->menu=array(
	array('label'=>'Listar Stock', 'url'=>array('index')),
	array('label'=>'Crear Stock', 'url'=>array('create')),
	array('label'=>'Actualizar Stock', 'url'=>array('update', 'id'=>$model->id_stock)),
	array('label'=>'Eliminar Stock', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_stock),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Stock', 'url'=>array('admin')),
);
?>

<h1>Ver Stock #<?php echo $model->id_stock; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_stock',
		'cantidad',
		'id_estacion',
		'id_medicamento',
	),
)); ?>
