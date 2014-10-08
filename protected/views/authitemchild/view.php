<?php
/* @var $this AuthitemchildController */
/* @var $model Authitemchild */

$this->breadcrumbs=array(
	'Authitemchildren'=>array('index'),
	$model->parent,
);

$this->menu=array(
	array('label'=>'Listar Authitemchild', 'url'=>array('index')),
	array('label'=>'Crear Authitemchild', 'url'=>array('create')),
	array('label'=>'Actualizar Authitemchild', 'url'=>array('update', 'id'=>$model->parent)),
	//array('label'=>'Eliminar Authitemchild', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->parent),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Authitemchild', 'url'=>array('admin')),
);
?>

<h1>Ver Authitemchild #<?php echo $model->parent; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'parent',
		'child',
	),
)); ?>
