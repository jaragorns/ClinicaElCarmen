<?php
/* @var $this BitacoraStockController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bitacora de Inventario',
);

$this->menu=array(
	array('label'=>'Create BitacoraStock', 'url'=>array('create')),
	array('label'=>'Manage BitacoraStock', 'url'=>array('admin')),
);
?>

<h1>Bitacora Stocks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
