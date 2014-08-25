<?php
/* @var $this AuthitemchildController */
/* @var $model Authitemchild */

$this->breadcrumbs=array(
	'Authitemchildren'=>array('index'),
	$model->parent=>array('view','id'=>$model->parent),
	'Update',
);

$this->menu=array(
	array('label'=>'List Authitemchild', 'url'=>array('index')),
	array('label'=>'Create Authitemchild', 'url'=>array('create')),
	array('label'=>'View Authitemchild', 'url'=>array('view', 'id'=>$model->parent)),
	array('label'=>'Manage Authitemchild', 'url'=>array('admin')),
);
?>

<h1>Update Authitemchild <?php echo $model->parent; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>