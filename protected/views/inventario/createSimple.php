<?php
/* @var $this InventarioController */
/* @var $model Inventario */

$this->breadcrumbs=array(
	'Crear Item de una Factura',
);

$this->menu=array(
	array('label'=>'Listar Inventario de Farmacia', 'url'=>array('index')),
	array('label'=>'Gestionar Inventario de Farmacia', 'url'=>array('admin')),
);
?>

<h1>Crear Item</h1>

<?php $this->renderPartial('_formSimple', array('model'=>$model)); ?>