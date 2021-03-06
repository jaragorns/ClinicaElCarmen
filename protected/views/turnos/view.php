<?php
/* @var $this TurnosController */
/* @var $model Turnos */

$this->breadcrumbs=array(
	'Turnos',
	$model->descripcion,
);

$this->menu=array(
	array('label'=>'Listar Turnos', 'url'=>array('index')),
	array('label'=>'Crear Turno', 'url'=>array('create')),
	array('label'=>'Actualizar Turnos', 'url'=>array('update', 'id'=>$model->id_turno)),
	array('label'=>'Gestionar Turnos', 'url'=>array('admin')),
);
?>

<h1>Turno <?php echo $model->descripcion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_turno',
		'descripcion',
		'abreviatura',
	),
)); ?>
