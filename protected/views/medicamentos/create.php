<?php
/* @var $this MedicamentosController */
/* @var $model Medicamentos */

$this->breadcrumbs=array(
	'Medicamentos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Medicamentos', 'url'=>array('index')),
	array('label'=>'Gestionar Medicamentos', 'url'=>array('admin')),
);
?>

<h1>Crear Medicamentos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>