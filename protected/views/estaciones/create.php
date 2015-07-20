<?php
/* @var $this EstacionesController */
/* @var $model Estaciones */

$this->breadcrumbs=array(
	'Estaciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Estaciones', 'url'=>array('index')),
	array('label'=>'Gestionar Estaciones', 'url'=>array('admin')),
);
?>

<h1>Crear Estación</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>