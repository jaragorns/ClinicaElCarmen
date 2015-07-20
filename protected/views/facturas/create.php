<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
);
?>

<h1>Crear Facturas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>