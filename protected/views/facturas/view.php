<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Factura'=>array('index'),
	'#'.$model->num_factura,
);

$this->menu = array(
	array('label'=>'Agregar Items de la Factura', 'url'=>array('/inventario/create','id_factura'=>$model->id_factura)),
	array('label'=>'Actualizar Factura', 'url'=>array('update', 'id'=>$model->id_factura)),
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
)); 

?>