<?php
/* @var $this EstacionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estaciones',
);

$this->menu=array(
	array('label'=>'Crear Estación', 'url'=>array('create')),
	array('label'=>'Gestionar Estaciones', 'url'=>array('admin')),
);
?>

<h1>Estaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
