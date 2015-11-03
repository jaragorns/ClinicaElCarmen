<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

$this->breadcrumbs=array(
	'Proveedores',
	'Crear',
);

$this->menu=array(
	array('label'=>'Gestionar Proveedores', 'url'=>array('admin')),
);
?>

<h1>Crear Proveedor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>