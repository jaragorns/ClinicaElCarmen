<?php
/* @var $this StockController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Stocks',
);

$this->menu=array(
	array('label'=>'Crear Stock', 'url'=>array('create')),
	array('label'=>'Gestionar Stock', 'url'=>array('admin')),
);
?>

<h1>Stocks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
