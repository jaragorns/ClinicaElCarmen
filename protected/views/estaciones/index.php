<?php
/* @var $this EstacionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Servicios',
);

$this->menu=array(
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Gestionar Servicios', 'url'=>array('admin')),
);
?>

<h1>Servicios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
