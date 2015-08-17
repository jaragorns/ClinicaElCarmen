<?php
/* @var $this UnidadMedidasController */
/* @var $model UnidadMedidas */

$this->breadcrumbs=array(
	'Unidad de Medidas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Unidad de Medidas', 'url'=>array('index')),
	array('label'=>'Gestionar Unidad de Medidas', 'url'=>array('admin')),
);
?>

<h1>Crear Unidad de Medidas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>