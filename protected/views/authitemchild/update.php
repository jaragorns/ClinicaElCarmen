<?php
/* @var $this AuthitemchildController */
/* @var $model Authitemchild */

$this->breadcrumbs=array(
	'Authitemchildren'=>array('index'),
	$model->parent=>array('view','id'=>$model->parent),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Authitemchild', 'url'=>array('index')),
	array('label'=>'Crear Authitemchild', 'url'=>array('create')),
	array('label'=>'Ver Authitemchild', 'url'=>array('view', 'id'=>$model->parent)),
	array('label'=>'Gestionar Authitemchild', 'url'=>array('admin')),
);
?>

<h1>Actualizar Authitemchild <?php echo $model->parent; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>