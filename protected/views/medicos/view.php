<?php
/* @var $this MedicosController */
/* @var $model Medicos */

$this->breadcrumbs=array(
	'Médicos'=>array('index'),
	$model->id_medico,
);

$this->menu=array(
	array('label'=>'Listar Médicos', 'url'=>array('index')),
	array('label'=>'Crear Médicos', 'url'=>array('create')),
	array('label'=>'Actualizar Médico', 'url'=>array('update', 'id'=>$model->id_medico)),
	array('label'=>'Borrar Médico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_medico),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Médicos', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->nombre_completo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_medico',
		'nombre_completo',
		'cedula',
		'especialidad',
		'rif',
		'consulta',
	),
)); ?>
