<?php
/* @var $this MedicosController */
/* @var $model Medicos */

$this->breadcrumbs=array(
	'Medicoses'=>array('index'),
	$model->id_medico=>array('view','id'=>$model->id_medico),
	'Update',
);

$this->menu=array(
	array('label'=>'List Medicos', 'url'=>array('index')),
	array('label'=>'Create Medicos', 'url'=>array('create')),
	array('label'=>'View Medicos', 'url'=>array('view', 'id'=>$model->id_medico)),
	array('label'=>'Manage Medicos', 'url'=>array('admin')),
);
?>

<h1>Update Medicos <?php echo $model->id_medico; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>