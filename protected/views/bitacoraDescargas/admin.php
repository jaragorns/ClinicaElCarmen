<?php
/* @var $this BitacoraDescargasController */
/* @var $model BitacoraDescargas */

$this->breadcrumbs=array(
	'Bitacora Descargases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BitacoraDescargas', 'url'=>array('index')),
	array('label'=>'Create BitacoraDescargas', 'url'=>array('create')),
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

<h1>Manage Bitacora Descargases</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bitacora-descargas-grid',
	'dataProvider'=>$model->searchDescarga(),
	'filter'=>$model,
	'columns'=>array(
		'fecha_hora',
		/*
		array(
			'name' => 'cantidad',
			'value' => '$data->cantidad." (".UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->unidad_medida))->descripcion.")"'
		),
		*/
		'estado',
		'id_stock',
		'id_guardia',
		/*
		array(
        	'header'=>'Cantidad',
        	'value'=>'CHTML::numberField("cant" ,"0" ,array(\'min\'=>0,\'max\'=>$data->cantidad))',
        	'type'=>'raw',
        	'htmlOptions'=>array('width'=>'60px'),
      	),
      	array(
        	'header'=>'',
        	'value'=>'CHTML::button("Descontar" ,array("submit" => array("bitacoraDescargas/descontar/stock=".$data->id_stock)))',
        	'type'=>'raw',
        	'htmlOptions'=>array('width'=>'20px'),
      	),
      	*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
