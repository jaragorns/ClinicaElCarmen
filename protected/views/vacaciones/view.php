<?php
/* @var $this VacacionesController */
/* @var $model Vacaciones */

$this->breadcrumbs=array(
	'Vacaciones'=>array('index'),
	Usuarios::model()->findByAttributes(array('id'=>$model->id_usuario))->NombreCompleto
);

$this->menu=array(
	array('label'=>'Listar Vacaciones', 'url'=>array('index')),
	array('label'=>'Crear Vacaciones', 'url'=>array('create')),
	array('label'=>'Modificar Vacaciones', 'url'=>array('update', 'id'=>$model->id_vacaciones)),
	array('label'=>'Gestionar Vacaciones', 'url'=>array('admin')),
);
?>

<h1>Vacaciones de <?php echo  Usuarios::model()->findByAttributes(array('id'=>$model->id_usuario))->NombreCompleto ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_vacaciones',
		array(
			'name' => 'id_usuario',
			'value' => Usuarios::model()->findByAttributes(array('id'=>$model->id_usuario))->nombres.' '.
						Usuarios::model()->findByAttributes(array('id'=>$model->id_usuario))->apellidos
		),
		array(
            'name' => 'fecha_inicio',
            'value' => date_format(date_create($model->fecha_inicio), "d-m-Y")
        ),
		array(
            'name' => 'fecha_fin',
            'value' => date_format(date_create($model->fecha_fin), "d-m-Y")
        ),	
	),
)); ?>
