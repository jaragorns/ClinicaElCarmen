<?php
/* @var $this InventarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Items de una Factura',
);

$this->menu=array(
	array('label'=>'Crear Item de una Factura', 'url'=>array('createSimple')),
	array('label'=>'Gestionar Inventario de Farmacia', 'url'=>array('admin')),
);
?>

<h1>Items de la Factura #<?php echo $id_factura; ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
