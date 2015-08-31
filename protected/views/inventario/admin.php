<?php
/* @var $this InventarioController */
/* @var $model Inventario */

$this->breadcrumbs=array(
	'Inventario en Farmacia'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Inventario en Farmacia', 'url'=>array('index')),
	array('label'=>'Crear Item de una Factura', 'url'=>array('createsimple')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#inventario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Inventario de Farmacia</h1>

<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ó <b>=</b>)  en el comienzo de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_inventario',
		array(
			'name' => 'id_factura',
			'value' => 'Facturas::model()->findByAttributes(array("id_factura"=>$data->id_factura))->num_factura'
		),
		array(
			'name' => 'id_estacion',
			'value' => 'Estaciones::model()->findByAttributes(array("id_estacion"=>$data->id_estacion))->nombre'
		),
		array(
			'name' => 'id_medicamento',
			'value' => 'Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->nombre'
		),
		'cantidad',
		array(
            'name' => 'precio_compra',
            'value' => 'str_replace(".",",",$data->precio_compra)',
        ),
		//'id_usuario',
		array(
        	'class'=>'CButtonColumn',
        	'template'=>'{view}',
		)
))); 

?>