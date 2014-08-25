<?php
/* @var $this AuthassignmentController */
/* @var $model Authassignment */

$this->breadcrumbs=array(
	'Authassignments'=>array('index'),
	$model->itemname,
);

$this->menu=array(
	array('label'=>'List Authassignment', 'url'=>array('index')),
	array('label'=>'Create Authassignment', 'url'=>array('create')),
	array('label'=>'Update Authassignment', 'url'=>array('update', 'id'=>$model->itemname)),
	array('label'=>'Delete Authassignment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->itemname),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Authassignment', 'url'=>array('admin')),
);
?>

<h1>View Authassignment #<?php echo $model->itemname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'itemname',
		'userid',
		'bizrule',
		'data',
	),
)); ?>
