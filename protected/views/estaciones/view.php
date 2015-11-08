<?php
/* @var $this EstacionesController */
/* @var $model Estaciones */

$this->breadcrumbs=array(
	'Servicio '.$model->nombre,
);

$this->menu=array(
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Modificar Servicio', 'url'=>array('update', 'id'=>$model->id_estacion)),
	array('label'=>'Gestionar Servicios', 'url'=>array('admin')),
);
?>

<h1>Servicio <?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_estacion',
		'nombre',
	),
)); ?>
