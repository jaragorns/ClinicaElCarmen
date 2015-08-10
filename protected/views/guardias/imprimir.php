<?php
/* @var $this GuardiasController */
/* @var $model Guardias */

$this->breadcrumbs=array(
	'Guardias'=>array('admin'),
	'Imprimir',
);

$this->menu=array(
	array('label'=>'Crear Guardia', 'url'=>array('create')),
	array('label'=>'Guardias', 'url'=>array('admin')),
);

?>

<h1>Imprimir Guardias</h1>


<?php $this->renderPartial('_imprimir'); ?>