<?php
/* @var $this AuthitemController */
/* @var $model Authitem */

$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	$model->name=>array('view','name'=>$model->name),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Authitem', 'url'=>array('index')),
	array('label'=>'Crear Authitem', 'url'=>array('create')),
	array('label'=>'Ver Authitem', 'url'=>array('view', 'name'=>$model->name)),
	array('label'=>'Gestionar Authitem', 'url'=>array('admin')),
);
?>

<h1>Actualizar Authitem <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>