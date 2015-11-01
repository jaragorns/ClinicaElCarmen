<?php
/* @var $this GuardiasController */
/* @var $model Guardias */

$this->breadcrumbs=array(
	'Guardias'=>array('index'),
	$model->id_guardia,
);

$this->menu=array(
	array('label'=>'Crear Guardia', 'url'=>array('create')),
	array('label'=>'Guardias', 'url'=>array('admin')),
);
?>

<h1>Guardia #<?php echo $model->id_guardia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_guardia',
		array(
			'name' => 'id_usuario',
			'value' => Usuarios::model()->findByAttributes(array('id'=>$model->id_usuario))->NombreCompleto
		),
		array(
			'name' => 'id_estacion',
			'value' => Estaciones::model()->findByAttributes(array('id_estacion'=>$model->id_estacion))->nombre
		),
		'mes',
		'ano',
		array(
			'name' => 'dia_1',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_1))->abreviatura
		),
		array(
			'name' => 'dia_2',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_2))->abreviatura
		),
		array(
			'name' => 'dia_3',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_3))->abreviatura
		),
		array(
			'name' => 'dia_4',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_4))->abreviatura
		),
		array(
			'name' => 'dia_5',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_5))->abreviatura
		),
		array(
			'name' => 'dia_6',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_6))->abreviatura
		),
		array(
			'name' => 'dia_7',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_7))->abreviatura
		),
		array(
			'name' => 'dia_8',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_8))->abreviatura
		),
		array(
			'name' => 'dia_9',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_9))->abreviatura
		),
		array(
			'name' => 'dia_10',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_10))->abreviatura
		),
		array(
			'name' => 'dia_11',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_11))->abreviatura
		),
		array(
			'name' => 'dia_12',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_12))->abreviatura
		),
		array(
			'name' => 'dia_13',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_13))->abreviatura
		),
		array(
			'name' => 'dia_14',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_14))->abreviatura
		),
		array(
			'name' => 'dia_15',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_15))->abreviatura
		),
		array(
			'name' => 'dia_16',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_16))->abreviatura
		),
		array(
			'name' => 'dia_17',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_17))->abreviatura
		),
		array(
			'name' => 'dia_18',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_18))->abreviatura
		),
		array(
			'name' => 'dia_19',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_19))->abreviatura
		),
		array(
			'name' => 'dia_20',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_20))->abreviatura
		),
		array(
			'name' => 'dia_21',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_21))->abreviatura
		),
		array(
			'name' => 'dia_22',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_22))->abreviatura
		),
		array(
			'name' => 'dia_23',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_23))->abreviatura
		),
		array(
			'name' => 'dia_24',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_24))->abreviatura
		),
		array(
			'name' => 'dia_25',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_25))->abreviatura
		),
		array(
			'name' => 'dia_26',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_26))->abreviatura
		),
		array(
			'name' => 'dia_27',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_27))->abreviatura
		),
		array(
			'name' => 'dia_28',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_28))->abreviatura
		),
		array(
			'name' => 'dia_29',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_29))->abreviatura
		),
		array(
			'name' => 'dia_30',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_30))->abreviatura
		),
		array(
			'name' => 'dia_31',
			'value' => Turnos::model()->findByAttributes(array('id_turno'=>$model->dia_31))->abreviatura
		),
	),
)); ?>
