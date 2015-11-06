<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */

$this->breadcrumbs=array(
	'Solicitudes',
	'Historial Solicitudes',
);

$this->menu=array(
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#solicitudes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php if(Yii::app()->user->role=='Farmaceuta') { ?>
	 	<h1>Historial de Solicitudes Procesadas</h1>
<?php }else {?>
	<h1>Historial de Solicitudes Procesadas por: <?php echo Usuarios::model()->findByAttributes(array('id'=>Yii::app()->user->id))->NombreCompleto; ?></h1>
<?php } ?>

<?php if(Yii::app()->user->role=='Farmaceuta') { ?>
			<div class="alert alert-info">
			<p><strong>Este historial muestra las solicitudes precesadas.</strong></p>
			</div>
<?php }else {?>
			<div class="alert alert-info">
			<p><strong>Este historial muestra las solicitudes precesadas por usted hacia otro servicio.</strong></p>
			</div>
<?php } ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'solicitudes-grid',	
	'dataProvider'=>$model->searchHistorial(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name' => 'fecha_solicitud',
            'value' => 'date_format(date_create($data->fecha_solicitud), "d-m-Y")',
           
        ),
        array(
        	'name' => 'estacion_id_estacion',
        	'value' => 'Estaciones::model()->findByAttributes(array("id_estacion"=>$data->estacion_id_estacion))->nombre'
        ),		
		array(
			'name' => 'usuarios',
			'value' => 'Usuarios::model()->findByAttributes(array("id"=>$data->usuarios))->NombreCompleto." - (".
						Estaciones::model()->findByAttributes(array("id_estacion"=>
							Guardias::model()->findByAttributes(array("id_guardia"=>$data->guardias_id_guardia))->id_estacion))->nombre
	  .")" '
		),
		 array(
            'name' => 'estado',
            'value' => 'strtr($data->estado, array("0" => "Pendiente","1" => "En Proceso","2" => "Procesada"))',
        ),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
			'buttons'=>array(
				'view'=>array(
					'url'=>'Yii::app()->createUrl("Solicitudes/viewPendiente",array("id"=>$data->id_solicitud))',
				),
			)
		),
	),
)); ?>
