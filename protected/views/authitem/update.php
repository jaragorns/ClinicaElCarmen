<?php
/* @var $this AuthitemController */
/* @var $model Authitem */

$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);

$this->menu=array(
	array('label'=>'List Authitem', 'url'=>array('index')),
	array('label'=>'Create Authitem', 'url'=>array('create')),
	array('label'=>'View Authitem', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Manage Authitem', 'url'=>array('admin')),
);
?>

<h1>Update Authitem <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>