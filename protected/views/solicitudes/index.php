<?php
/* @var $this SolicitudesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Solicitudes',
);

$this->menu=array(
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Mis Solicitudes', 'url'=>array('admin')),
	array('label'=>'Solicitudes Pendientes', 'url'=>array('adminPendiente')),
);
?>

<h1>Solicitudes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
