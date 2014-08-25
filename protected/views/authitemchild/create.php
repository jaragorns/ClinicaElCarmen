<?php
/* @var $this AuthitemchildController */
/* @var $model Authitemchild */

$this->breadcrumbs=array(
	'Authitemchildren'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Authitemchild', 'url'=>array('index')),
	array('label'=>'Manage Authitemchild', 'url'=>array('admin')),
);
?>

<h1>Create Authitemchild</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>