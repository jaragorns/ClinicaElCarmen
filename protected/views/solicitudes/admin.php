<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */

$this->breadcrumbs=array(
	'Solicitudes',
	'Mis Solicitudes',
);

$this->menu=array(
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Solicitudes Pendientes', 'url'=>array('adminPendiente')),
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

<h1>Mis Solicitudes</h1>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'solicitudes-grid',	
	'dataProvider'=>$model->search(),
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
		),
	),
)); ?>
