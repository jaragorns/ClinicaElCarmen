<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#facturas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Facturas</h1>

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

<?php
	$search  = array('1', '2', '3');
	$replace = array('75%', '100%', 'Sin Retencion'); 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_factura',
		'num_factura',
		array(
            'name' => 'id_proveedor',
            'value' => 'Proveedores::model()->findByAttributes(array("id_proveedor"=>$data->id_proveedor))->nombre'
        ),
		array(
            'name' => 'fecha_factura',
            'value' => 'date_format(date_create($data->fecha_factura), "d-m-Y")',
            'htmlOptions' => array('style'=>'text-align: right;'),
        ),
        array(
            'name' => 'fecha_entrada',
            'value' => 'date_format(date_create($data->fecha_entrada), "d-m-Y")',
            'htmlOptions' => array('style'=>'text-align: right;'),
        ),
		array(
            'name' => 'fecha_vencimiento',
            'value' => 'date_format(date_create($data->fecha_vencimiento), "d-m-Y")',
            'htmlOptions' => array('style'=>'text-align: right;'),
        ),
		array(
            'name' => 'monto',
            'value' => 'str_replace(".",",",$data->monto)',
            'htmlOptions' => array('style'=>'width:120px; text-align: right;'),
        ),
		
        array(
            'name' => 'retencion',
            'value' => 'strtr($data->retencion, array("1" => "75%","2" => "100%","3" => "S/R"))',
            'htmlOptions' => array('style'=>'width:70px; text-align: right;'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
