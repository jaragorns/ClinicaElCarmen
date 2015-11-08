<?php
/* @var $this TurnosController */
/* @var $model Turnos */

$this->breadcrumbs=array(
	'Crear Turnos',
);

$this->menu=array(
	array('label'=>'Gestionar Turnos', 'url'=>array('admin')),
);
?>

<h1>Crear Turnos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>