<?php
/* @var $this AuthitemController */
/* @var $model Authitem */

$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Authitem', 'url'=>array('index')),
	array('label'=>'Crear Authitem', 'url'=>array('create')),
	array('label'=>'Actualizar Authitem', 'url'=>array('update', 'id'=>$model->id)),
	//#array('label'=>'Eliminar Authitem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Authitem', 'url'=>array('admin')),
);
?>

<h1>Ver Authitem #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'type',
		'description',
		'bizrule',
		'data',
	),
)); ?>
