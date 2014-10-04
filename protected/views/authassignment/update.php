<?php
/* @var $this AuthassignmentController */
/* @var $model Authassignment */

$this->breadcrumbs=array(
	'Authassignments'=>array('index'),
	$model->itemname=>array('view','id'=>$model->itemname),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Authassignment', 'url'=>array('index')),
	array('label'=>'Crear Authassignment', 'url'=>array('create')),
	array('label'=>'Ver Authassignment', 'url'=>array('view', 'id'=>$model->itemname)),
	array('label'=>'Gestionar Authassignment', 'url'=>array('admin')),
);
?>

<h1>Actualizar Authassignment <?php echo $model->itemname; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>