<?php
/* @var $this InventarioController */
/* @var $model Inventario */

$this->breadcrumbs=array(
	'Actualizar Item',
	'Factura #'.$model_factura->num_factura,
);

$this->menu=array(
	array('label'=>'Listar Inventario', 'url'=>array('index')),
	array('label'=>'Crear Inventario', 'url'=>array('create')),
	array('label'=>'Ver Item', 'url'=>array('view', 'id'=>$model->id_inventario)),
	array('label'=>'Gestionar Inventario', 'url'=>array('admin')),
);
?>

<h1>Actualizar Item Factura #<?php echo $model_factura->num_factura; ?></h1>

<?php $this->renderPartial('_formSimple', array('model'=>$model, 'model_factura'=>$model_factura)); ?>