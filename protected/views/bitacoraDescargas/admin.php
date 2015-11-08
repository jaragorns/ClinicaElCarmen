<?php
/* @var $this BitacoraDescargasController */
/* @var $model BitacoraDescargas */

$this->breadcrumbs=array(
	'Bitacora Descargas',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#bitacora-descargas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestión de Bitacora Descargas</h1>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bitacora-descargas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'header' => 'Usuario',
			'value' => 'Usuarios::model()->findByAttributes(array("id"=>Guardias::model()->findByAttributes(array("id_guardia"=>$data->id_guardia))->id_usuario))->NombreCompleto',
		),
		array(
			'header' => 'Servicio',
			'value' => 'Estaciones::model()->findByAttributes(array("id_estacion"=>Guardias::model()->findByAttributes(array("id_guardia"=>$data->id_guardia))->id_estacion))->nombre',
		),
		array(
			'header' => 'Medicamento',
			'value' => 'Medicamentos::model()->findByAttributes(array("id_medicamento"=>Stock::model()->findByAttributes(array("id_stock"=>$data->id_stock))->id_medicamento))->nombre." (".UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>Medicamentos::model()->findByAttributes(array("id_medicamento"=>Stock::model()->findByAttributes(array("id_stock"=>$data->id_stock))->id_medicamento))->unidad_medida))->descripcion.")"'
		),
		'cantidad',
		array(
            'name'  => 'fecha_hora',
            'value' => 'date_format(date_create($data->fecha_hora), "d-m-Y g:ia")',
        ),
	),
)); ?>
