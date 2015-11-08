<?php
/* @var $this UnidadMedidasController */
/* @var $model UnidadMedidas */

$this->breadcrumbs=array(
	'Crear Unidad de Medidas',
);

$this->menu=array(
	array('label'=>'Gestionar Unidad de Medidas', 'url'=>array('admin')),
);
?>

<h1>Crear Unidad de Medidas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>