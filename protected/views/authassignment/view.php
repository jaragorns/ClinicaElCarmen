<?php
/* @var $this AuthassignmentController */
/* @var $model Authassignment */

$this->breadcrumbs=array(
	'AuthAssignments'=>array('index'),
	$model->itemname,
);

$this->menu=array(
	array('label'=>'Listar Authassignment', 'url'=>array('index')),
	array('label'=>'Crear Authassignment', 'url'=>array('create')),
	array('label'=>'Actualizar Authassignment', 'url'=>array('update', 'id'=>$model->itemname)),
	//array('label'=>'Eliminar Authassignment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->itemname),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Authassignment', 'url'=>array('admin')),
);
?>

<h1>Ver Authassignment #<?php echo $model->itemname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'itemname',
		'userid',
		'bizrule',
		'data',
	),
)); ?>
