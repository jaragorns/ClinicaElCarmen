<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/libre.css');

$this->breadcrumbs=array(
	'Solicitudes',
	$model->id_solicitud,
);

$this->menu=array(
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Mis Solicitudes', 'url'=>array('admin')),
	array('label'=>'Solicitudes Pendientes', 'url'=>array('adminPendiente')),
);
?>

<h1>Solicitud #<?php echo $model->id_solicitud; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name' => 'fecha_solicitud',
			'value' => date_format(date_create($model->fecha_solicitud),'d-m-Y')
		),
		array(
			'name' => 'estacion_id_estacion',
			'value' => Estaciones::model()->findByAttributes(array('id_estacion'=>$model->estacion_id_estacion))->nombre
		),
		array(
			'name' => 'usuarios',
			'value' => Usuarios::model()->findByAttributes(array('id'=>$model->usuarios))->NombreCompleto.' - ('.
						Estaciones::model()->findByAttributes(array('id_estacion'=>
							Guardias::model()->findByAttributes(array('id_guardia'=>$model->guardias_id_guardia))->id_estacion))->nombre
	  .')' 
		),
	),
)); ?>
<br><br>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'solicitudes-grid',	
	'dataProvider'=>$model->searchItems($model->id_solicitud),
	'columns'=>array(
		array(
            'name' => 'id_medicamento',
            'value' => 'Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->nombre',     
            'htmlOptions' => array('style'=>'text-align: left;'),      
        ),
        array(
        	'name' => 'cantidad',
        	'value' => '$data->cantidad',
        	'htmlOptions' => array('style'=>'text-align: center;'),
        ),
         array(
            'name' => 'estado',
            'value' => 'strtr($data->estado, array("0" => "Pendiente","1" => "Aprobado","2" => "Rechazado"))',
            'htmlOptions' => array('style'=>'text-align: center;'),
        ),
	),
)); ?>