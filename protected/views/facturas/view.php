<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Factura'=>array('index'),
	$model->num_factura,
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Actualizar Factura', 'url'=>array('update', 'id'=>$model->id_factura)),
	array('label'=>'Eliminar Factura', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_factura),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
);
?>

<h1>Factura #<?php echo $model->num_factura; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'num_factura',
		'fecha',
		'monto',
		array(
			'name' => 'id_proveedor',
			'value' => Proveedores::model()->findByAttributes(array('id_proveedor'=>$model->id_proveedor))->nombre
		),
	),
)); ?>
