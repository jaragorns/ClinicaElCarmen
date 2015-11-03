<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

$this->breadcrumbs=array(
	'Proveedores',
	$model->nombre,
);

$this->menu=array(
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Actualizar Proveedor', 'url'=>array('update', 'id'=>$model->id_proveedor)),
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
