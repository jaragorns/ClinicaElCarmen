<?php
/* @var $this TicketsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tickets',
);

$this->menu=array(
	array('label'=>'Create Tickets', 'url'=>array('create')),
	array('label'=>'Manage Tickets', 'url'=>array('admin')),
);
?>

<h1>Tickets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
