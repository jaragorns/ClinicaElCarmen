<?php
/* @var $this EstacionesController */
/* @var $model Estaciones */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->id_estacion=>array('view','id'=>$model->id_estacion),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Listar Servicios', 'url'=>array('index')),
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Ver Servicio', 'url'=>array('view', 'id'=>$model->id_estacion)),
	array('label'=>'Gestionar Servicios', 'url'=>array('admin')),
);
?>

<h1>Modificar Servicio <?php echo $model->id_estacion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>