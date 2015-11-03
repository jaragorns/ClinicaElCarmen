<?php
/* @var $this StockController */
/* @var $model Stock */

$this->breadcrumbs=array(
	'Stocks'=>array('index'),
	$model->id_stock,
);

$this->menu=array(
	array('label'=>'Crear Stock', 'url'=>array('create')),
	array('label'=>'Actualizar Stock', 'url'=>array('update', 'id'=>$model->id_stock)),
	array('label'=>'Gestionar Stock', 'url'=>array('admin')),
);
?>

<h1>Stock <?php echo $model->id_stock; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_stock',
		'cantidad',
		'id_estacion',
		'id_medicamento',
	),
)); ?>
