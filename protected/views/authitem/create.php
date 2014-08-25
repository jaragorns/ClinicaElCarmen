<?php
/* @var $this AuthitemController */
/* @var $model Authitem */

$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Authitem', 'url'=>array('index')),
	array('label'=>'Manage Authitem', 'url'=>array('admin')),
);
?>

<h1>Create Authitem</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>