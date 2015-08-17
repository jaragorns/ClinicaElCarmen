<?php
/* @var $this InventarioController */
/* @var $model Inventario */

//echo ("ID:".$model_factura->id_factura." - Num. Factura: ".$model_factura->num_factura);

$this->breadcrumbs=array(
	'Item de la Factura',
	$model_factura->num_factura,
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Inventario de Farmacia', 'url'=>array('index')),
	array('label'=>'Gestionar Inventario de Farmacia', 'url'=>array('admin')),
);
?>

<h1>Crear Item de la Factura #<?php echo $model_factura->num_factura; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'model_factura'=>$model_factura)); ?>