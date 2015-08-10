<?php
/* @var $this InventarioController */
/* @var $model Inventario */

//$model_factura = new Facturas;
//$model_factura = Facturas::model()->findByAttributes(array("id_factura"=>$model->id_factura));

$this->breadcrumbs=array(
	'Item de la Factura'=>array('index'),
	$model_factura->num_factura,
);

$this->menu=array(
	array('label'=>'Agregar Item de la Factura', 'url'=>array('create', 'id_factura'=>$model_factura->id_factura)),
	array('label'=>'Listar Items de la Factura', 'url'=>array('index')),
	array('label'=>'Actualizar Item', 'url'=>array('update', 'id'=>$model->id_inventario)),
	array('label'=>'Eliminar Item', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_inventario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Inventario de Farmacia', 'url'=>array('admin')),
);
?>

<h1>Factura #<?php echo $model_factura->num_factura." Proveedor: ".CHtml::encode(Proveedores::model()->findByAttributes(array('id_proveedor'=>Facturas::model()->findByAttributes(array('id_factura'=>$model->id_factura))->id_proveedor))->nombre); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_inventario',
		array(
			'name' => 'id_factura',
			'value' => CHtml::encode($model_factura->num_factura)
		),
		array(
			'name' => 'id_estacion',
			'value' => CHtml::encode(Estaciones::model()->findByAttributes(array('id_estacion'=>$model->id_estacion))->nombre)
		),
		array(
			'name' => 'id_medicamento',
			'value' => CHtml::encode(Medicamentos::model()->findByAttributes(array('id_medicamento'=>$model->id_medicamento))->nombre)
		),
		'cantidad',
		'precio_compra',
	),
)); ?>
<br>

