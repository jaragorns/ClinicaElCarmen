<?php
/* @var $this GuardiasController */
/* @var $model Guardias */

$this->breadcrumbs=array(
	'Guardias',
	'Crear',
);

$this->menu=array(
	array('label'=>'Guardias', 'url'=>array('admin')),
);
?>

<h1>Crear Guardia</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>