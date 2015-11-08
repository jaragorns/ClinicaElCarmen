<?php
/* @var $this VacacionesController */
/* @var $model Vacaciones */

$this->breadcrumbs=array(
	'Modificar Vacaciones', Usuarios::model()->findByAttributes(array('id'=>$model->id_usuario))->NombreCompleto,
);

$this->menu=array(
	array('label'=>'Crear Vacaciones', 'url'=>array('create')),
	array('label'=>'Ver Vacaciones', 'url'=>array('view', 'id'=>$model->id_vacaciones)),
	array('label'=>'Gestionar Vacaciones', 'url'=>array('admin')),
);
?>

<h1>Modificar Vacaciones de <?php echo Usuarios::model()->findByAttributes(array('id'=>$model->id_usuario))->NombreCompleto ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>