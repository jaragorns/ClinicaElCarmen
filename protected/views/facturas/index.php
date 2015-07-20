<?php
/* @var $this FacturasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facturas',
);

$this->menu=array(
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
);
?>

<h1>Facturas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
