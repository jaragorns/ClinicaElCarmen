<?php
/* @var $this TurnosController */
/* @var $model Turnos */

$this->breadcrumbs=array(
	'Modificar Turnos', $model->descripcion,
);

$this->menu=array(
	array('label'=>'Crear Turno', 'url'=>array('create')),
	array('label'=>'Ver Turnos', 'url'=>array('view', 'id'=>$model->id_turno)),
	array('label'=>'Gestionar Turnos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Turnos <?php echo $model->descripcion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>