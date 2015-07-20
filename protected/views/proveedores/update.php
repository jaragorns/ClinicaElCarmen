<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->nombre,
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Ver Proveedor', 'url'=>array('view', 'id'=>$model->id_proveedor)),
	array('label'=>'Gestonar Proveedores', 'url'=>array('admin')),
);
?>

<h1>Actualizar Proveedor: <?php echo $model->nombre." - ".$model->rif; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>