<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */

$this->breadcrumbs=array(
	'Comprobantes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Comprobantes', 'url'=>array('index')),
	array('label'=>'Gestionar Comprobantes', 'url'=>array('admin')),
);
?>

<h1>Crear Comprobantes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>