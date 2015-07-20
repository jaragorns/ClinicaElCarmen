<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>'Listar Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Actualizar Proveedor', 'url'=>array('update', 'id'=>$model->id_proveedor)),
	array('label'=>'Eliminar Proveedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_proveedor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Proveedores', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->nombre." - ".$model->rif; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_proveedor',
		'nombre',
		'rif',
		'telefono',
		'direccion',
		'email',
	),
)); ?>
