<?php
/* @var $this StockController */
/* @var $model Stock */

$this->breadcrumbs=array(
	'Stocks'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Stock', 'url'=>array('index')),
	array('label'=>'Gestionar Stock', 'url'=>array('admin')),
);
?>

<h1>Crear Stock</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>