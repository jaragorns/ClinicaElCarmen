<?php
/* @var $this StockController */
/* @var $model Stock */

$this->breadcrumbs=array(
	'Gestionar Inventario ',
);
if(!empty(SolicitudesController::verificarGuardia()->id_guardia)){
	$this->menu=array(
	array('label'=>'Asignar Medicamentos', 'url'=>array('asignar')),
);
}


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#stock-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Inventario</h1>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id_medicamento',
			'value' => 'Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->nombre'
		),
		array(
			'name' => 'cantidad',
			'value' => '$data->cantidad." (".UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->unidad_medida))->descripcion.")"'
		),
		array(
			'name' => 'id_estacion',
			'value' => 'Estaciones::model()->findByAttributes(array("id_estacion"=>$data->id_estacion))->nombre'
		),
	),
)); ?>