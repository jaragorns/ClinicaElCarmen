<?php
/* @var $this BitacoraStockController */
/* @var $model BitacoraStock */

$this->breadcrumbs=array(
	'Bitacora de Asignaciones',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#bitacora-stock-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Bitacora de Asignaciones</h1>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bitacora-stock-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id_usuario',
			'value' => 'Usuarios::model()->findByAttributes(array("id"=>$data->id_usuario))->nombres." ".
			Usuarios::model()->findByAttributes(array("id"=>$data->id_usuario))->apellidos'
		),
		array(
			'name' => 'id_estacion_origen',
			'value' => 'Estaciones::model()->findByAttributes(array("id_estacion"=>$data->id_estacion_origen))->nombre'
		),
		array(
			'name' => 'id_estacion_destino',
			'value' => 'Estaciones::model()->findByAttributes(array("id_estacion"=>$data->id_estacion_destino))->nombre'
		),
		array(
			'name' => 'id_medicamento',
			'value' => 'Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->nombre." (".UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->unidad_medida))->descripcion.")"'
		),
		array(
			'name' => 'cantidad',
			'value' => '$data->cantidad." (".UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->unidad_medida))->descripcion.")"',
		),
		array(
            'name' => 'fecha',
            'value' => 'date_format(date_create($data->fecha), "d-m-Y g:ia")',
            'htmlOptions' => array('style'=>'text-align: right;'),
        ),
	),
)); ?>
