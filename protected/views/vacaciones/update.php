<?php
/* @var $this VacacionesController */
/* @var $model Vacaciones */

$this->breadcrumbs=array(
	'Vacaciones'=>array('index'),
	$model->id_vacaciones=>array('view','id'=>$model->id_vacaciones),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Listar Vacaciones', 'url'=>array('index')),
	array('label'=>'Crear Vacaciones', 'url'=>array('create')),
	array('label'=>'Ver Vacaciones', 'url'=>array('view', 'id'=>$model->id_vacaciones)),
	array('label'=>'Gestionar Vacaciones', 'url'=>array('admin')),
);
?>

<h1>Modificar Vacaciones de <?php echo Usuarios::model()->findByAttributes(array('id'=>$model->id_usuario))->nombres.' '.
						Usuarios::model()->findByAttributes(array('id'=>$model->id_usuario))->apellidos ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>