<?php
/* @var $this AuthassignmentController */
/* @var $model Authassignment */

$this->breadcrumbs=array(
	'Authassignments'=>array('index'),
	$model->itemname=>array('view','id'=>$model->itemname),
	'Update',
);

$this->menu=array(
	array('label'=>'List Authassignment', 'url'=>array('index')),
	array('label'=>'Create Authassignment', 'url'=>array('create')),
	array('label'=>'View Authassignment', 'url'=>array('view', 'id'=>$model->itemname)),
	array('label'=>'Manage Authassignment', 'url'=>array('admin')),
);
?>

<h1>Update Authassignment <?php echo $model->itemname; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>