<?php
/* @var $this RolesController */
/* @var $model Roles */

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Crear Rol', 'url'=>array('create')),
	array('label'=>'Ver Rol', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Roles', 'url'=>array('admin')),
);
?>

<h1>Actualizar Rol <?php echo $model->description; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>