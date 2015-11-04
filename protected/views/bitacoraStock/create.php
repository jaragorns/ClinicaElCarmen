<?php
/* @var $this BitacoraStockController */
/* @var $model BitacoraStock */

$this->breadcrumbs=array(
	'Bitacora de Inventario'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BitacoraStock', 'url'=>array('index')),
	array('label'=>'Manage BitacoraStock', 'url'=>array('admin')),
);
?>

<h1>Create BitacoraStock</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>