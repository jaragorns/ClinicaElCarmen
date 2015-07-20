<?php
/* @var $this EstacionesController */
/* @var $model Estaciones */

$this->breadcrumbs=array(
	'Estaciones'=>array('index'),
	$model->id_estacion=>array('view','id'=>$model->id_estacion),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Listar Estaciones', 'url'=>array('index')),
	array('label'=>'Crear Estación', 'url'=>array('create')),
	array('label'=>'Ver Estación', 'url'=>array('view', 'id'=>$model->id_estacion)),
	array('label'=>'Gestionar Estaciones', 'url'=>array('admin')),
);
?>

<h1>Modificar Estaciones <?php echo $model->id_estacion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>