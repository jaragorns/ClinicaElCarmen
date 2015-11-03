<?php
/* @var $this StockController */
/* @var $model Stock */

$this->breadcrumbs=array(
	'Crear Stock',
);

$this->menu=array(
	array('label'=>'Gestionar Stock', 'url'=>array('admin')),
);
?>

<h1>Crear Stock</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>