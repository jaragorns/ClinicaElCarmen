<?php
/* @var $this MedicosController */
/* @var $model Medicos */

$this->breadcrumbs=array(
	'Médicos'=>array('index'),
	$model->nombre_completo,
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Médicos', 'url'=>array('index')),
	array('label'=>'Crear Médico', 'url'=>array('create')),
	array('label'=>'Ver Médico', 'url'=>array('view', 'id'=>$model->id_medico)),
	array('label'=>'Gestionar Médicos', 'url'=>array('administrar')),
);
?>

<h1>Actualizar <?php echo $model->nombre_completo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>