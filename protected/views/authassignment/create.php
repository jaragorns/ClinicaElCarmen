<?php
/* @var $this AuthassignmentController */
/* @var $model Authassignment */

$this->breadcrumbs=array(
	'Authassignments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Authassignment', 'url'=>array('index')),
	array('label'=>'Manage Authassignment', 'url'=>array('admin')),
);
?>

<h1>Create Authassignment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>