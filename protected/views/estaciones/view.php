<?php
/* @var $this EstacionesController */
/* @var $model Estaciones */

$this->breadcrumbs=array(
	'Estaciones'=>array('index'),
	$model->id_estacion,
);

$this->menu=array(
	array('label'=>'Listar Estaciones', 'url'=>array('index')),
	array('label'=>'Crear Estación', 'url'=>array('create')),
	array('label'=>'Modificar Estación', 'url'=>array('update', 'id'=>$model->id_estacion)),
	array('label'=>'Gestionar Estaciones', 'url'=>array('admin')),
);
?>

<<<<<<< HEAD
<h1>Estación <?php echo $model->nombre; ?></h1>
=======
<h1>Estación #<?php echo $model->id_estacion; ?></h1>
>>>>>>> origin/master

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_estacion',
		'nombre',
	),
)); ?>
