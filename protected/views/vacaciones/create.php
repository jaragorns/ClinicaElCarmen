<?php
/* @var $this VacacionesController */
/* @var $model Vacaciones */

$this->breadcrumbs=array(
	'Vacaciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Vacaciones', 'url'=>array('index')),
	array('label'=>'Gestionar Vacaciones', 'url'=>array('admin')),
);
?>

<h1>Crear Vacaciones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>