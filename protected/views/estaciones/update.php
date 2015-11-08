<?php
/* @var $this EstacionesController */
/* @var $model Estaciones */

$this->breadcrumbs=array(
	'Modificar Servicios',
);

$this->menu=array(
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Ver Servicio', 'url'=>array('view', 'id'=>$model->id_estacion)),
	array('label'=>'Gestionar Servicios', 'url'=>array('admin')),
);
?>

<h1>Modificar Servicio <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>