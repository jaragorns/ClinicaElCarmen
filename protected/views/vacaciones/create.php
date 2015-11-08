<?php
/* @var $this VacacionesController */
/* @var $model Vacaciones */

$this->breadcrumbs=array(
	'Crear Vacaciones',
);

$this->menu=array(
	array('label'=>'Gestionar Vacaciones', 'url'=>array('admin')),
);
?>

<h1>Crear Vacaciones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>