<?php
/* @var $this AuthitemchildController */
/* @var $model Authitemchild */

$this->breadcrumbs=array(
	'Authitemchildren'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Authitemchild', 'url'=>array('index')),
	array('label'=>'Gestionar Authitemchild', 'url'=>array('admin')),
);
?>

<h1>Crear Authitemchild</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>