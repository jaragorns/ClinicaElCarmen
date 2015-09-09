<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */

$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	$model->id_solicitud,
);

$this->menu=array(
	array('label'=>'List Solicitudes', 'url'=>array('index')),
	array('label'=>'Create Solicitudes', 'url'=>array('create')),
	array('label'=>'Update Solicitudes', 'url'=>array('update', 'id'=>$model->id_solicitud)),
	array('label'=>'Delete Solicitudes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_solicitud),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Solicitudes', 'url'=>array('admin')),
);
?>

<h1>View Solicitudes #<?php echo $model->id_solicitud; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_solicitud',
		'estacion_id_estacion',
		'cantidad',
		'usuarios',
		'stock_id_stock',
		'guardias_id_guardia',
	),
)); ?>
