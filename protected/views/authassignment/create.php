<?php
/* @var $this AuthassignmentController */
/* @var $model Authassignment */

$this->breadcrumbs=array(
	'AuthAssignments'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar AuthAssignment', 'url'=>array('index')),
	array('label'=>'Gestionar AuthAssignment', 'url'=>array('admin')),
);
?>

<h1>Crear Authassignment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>