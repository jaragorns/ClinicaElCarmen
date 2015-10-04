<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */

$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	'Crear Solicitud',
);

$this->menu=array(
	array('label'=>'Lista de Solicitudes', 'url'=>array('index')),
	array('label'=>'Gestionar Solicitudes', 'url'=>array('admin')),
);
?>

<h1>Crear Solicitud</h1>

<?php $this->renderPartial('_form', array('model'=>$model,
										'items_0'=>$items_0,
										'items_1'=>$items_1, 
										'items_2'=>$items_2,
										'items_3'=>$items_3,
										'items_4'=>$items_4,
										'items_5'=>$items_5,
										'items_6'=>$items_6,
										'items_7'=>$items_7,
										'items_8'=>$items_8,
										'items_9'=>$items_9,
										)); ?>