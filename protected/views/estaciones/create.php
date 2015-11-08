<?php
/* @var $this EstacionesController */
/* @var $model Estaciones */

$this->breadcrumbs=array(
	'Crear Servicio',
);

$this->menu=array(
	array('label'=>'Gestionar Servicios', 'url'=>array('admin')),
);
?>

<h1>Crear Servicio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>