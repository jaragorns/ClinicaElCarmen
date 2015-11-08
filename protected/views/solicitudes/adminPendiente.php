<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */

$this->breadcrumbs=array(
	'Solicitudes Pendientes',
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
<?php if(Yii::app()->user->role=='Farmaceuta' OR Yii::app()->user->role=='Jefe_Farmacia') { ?>
	 	<h1>Solicitudes Pendientes en: FARMACIA</h1>
<?php }else {?>
	<h1>Solicitudes Pendientes en: <?php echo Estaciones::model()->findByAttributes(array('id_estacion'=>SolicitudesController::verificarGuardia()->id_estacion))->nombre;  ?></h1>
<?php } ?>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'solicitudes-grid',	
	'dataProvider'=>$model->searchPendiente(),
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
