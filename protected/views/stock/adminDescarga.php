<?php
/* @var $this StockController */
/* @var $model Stock */

$this->breadcrumbs=array(
	'Stocks'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Stock', 'url'=>array('index')),
	array('label'=>'Asignar Medicamentos', 'url'=>array('asignar')),
);

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

<h1>Descarga de Medicamentos</h1>

<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ó <b>=</b>)  en el comienzo de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchDescarga',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
	Yii::import('application.extensions.eeditable.*');
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-grid',
	'dataProvider'=>$model->searchDescarga(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id_medicamento',
			'value' => 'Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->nombre." (".UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->unidad_medida))->descripcion.")"'
		),
		array(
			'header' => 'Existencia',
			'value' => '$data->cantidad." (".UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->unidad_medida))->descripcion.")"'
		),
		array(
			'name' => 'id_estacion',
			'value' => 'Estaciones::model()->findByAttributes(array("id_estacion"=>$data->id_estacion))->nombre'
		),
		array(
			'header'=>'Cantidad',
			'value'=>'0',
			'class'=>'EEditableColumn','editable_type'=>'editbox',
			'action'=>array('bitacoraDescargas/descontar'),
		),
		/*
		array(
        	'header'=>'qwe',
        	'value'=>'CHTML::numberField("cant" ,"0" ,array(\'min\'=>0,\'max\'=>$data->cantidad))',
        	'type'=>'raw',
        	'htmlOptions'=>array('width'=>'60px'),
      	),
      	*/
      	array(
        	'header'=>'',
        	'value'=>'CHTML::button("Descontar" ,array("submit"=>array("bitacoraDescargas/submit/stock/".$data->id_stock), "class"=>"btn btn-primary btn-large"))',
        	'type'=>'raw',
        	'htmlOptions'=>array('width'=>'20px'),
      	),
      	/* 
		array(
			'class'=>'CButtonColumn',
		),
		*/
	),
));
 ?>

