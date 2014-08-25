<?php
/* @var $this AuthitemchildController */
/* @var $model Authitemchild */

$this->breadcrumbs=array(
	'Authitemchildren'=>array('index'),
	$model->parent,
);

$this->menu=array(
	array('label'=>'List Authitemchild', 'url'=>array('index')),
	array('label'=>'Create Authitemchild', 'url'=>array('create')),
	array('label'=>'Update Authitemchild', 'url'=>array('update', 'id'=>$model->parent)),
	array('label'=>'Delete Authitemchild', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->parent),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Authitemchild', 'url'=>array('admin')),
);
?>

<h1>View Authitemchild #<?php echo $model->parent; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'parent',
		'child',
	),
)); ?>
