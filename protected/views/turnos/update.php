<?php
/* @var $this TurnosController */
/* @var $model Turnos */

$this->breadcrumbs=array(
	'Turnos'=>array('index'),
	$model->id_turno=>array('view','id'=>$model->id_turno),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Turnos', 'url'=>array('index')),
	array('label'=>'Crear Turno', 'url'=>array('create')),
	array('label'=>'Ver Turnos', 'url'=>array('view', 'id'=>$model->id_turno)),
	array('label'=>'Gestionar Turnos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Turnos <?php echo $model->id_turno; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>