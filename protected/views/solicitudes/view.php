<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */

$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	$model->id_solicitud,
);

$this->menu=array(
	array('label'=>'Lista de Solicitudes', 'url'=>array('index')),
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Modificar Solicitud', 'url'=>array('update', 'id'=>$model->id_solicitud)),
	array('label'=>'Eliminar Solicitud', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_solicitud),'confirm'=>'Está seguro de eliminar la solicitud?')),
	array('label'=>'Gestionar Solicitudes', 'url'=>array('admin')),
);
?>

<h1>Solicitud #<?php echo $model->id_solicitud; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name' => 'estacion_id_estacion',
			'value' => Estaciones::model()->findByAttributes(array('id_estacion'=>$model->estacion_id_estacion))->nombre
						
		),
		array(
			'name' => 'stock_id_stock',
			'value' => Medicamentos::model()->findByAttributes(array('id_medicamento'=>$model->stockIdStock->id_medicamento))->nombre
		),
		'cantidad',
		array(
			'name' => 'usuarios',
			'value' => Usuarios::model()->findByAttributes(array('id'=>$model->usuarios))->NombreCompleto.' - ('.
						Estaciones::model()->findByAttributes(array('id_estacion'=>
							Guardias::model()->findByAttributes(array('id_guardia'=>$model->guardias_id_guardia))->id_estacion))->nombre
	  .')' 
		),
	),
)); ?>
