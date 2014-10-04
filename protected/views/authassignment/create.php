<?php
/* @var $this AuthassignmentController */
/* @var $model Authassignment */

$this->breadcrumbs=array(
	'Authassignments'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Authassignment', 'url'=>array('index')),
	array('label'=>'Gestionar Authassignment', 'url'=>array('admin')),
);
?>

<h1>Crear Authassignment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>