<?php
/* @var $this BitacoraDescargasController */
/* @var $model BitacoraDescargas */

$this->breadcrumbs=array(
	'Bitacora Descargases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BitacoraDescargas', 'url'=>array('index')),
	array('label'=>'Manage BitacoraDescargas', 'url'=>array('admin')),
);
?>

<h1>Create BitacoraDescargas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>