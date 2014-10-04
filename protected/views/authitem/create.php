<?php
/* @var $this AuthitemController */
/* @var $model Authitem */

$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Authitem', 'url'=>array('index')),
	array('label'=>'Gestionar Authitem', 'url'=>array('admin')),
);
?>

<h1>Crear Authitem</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>