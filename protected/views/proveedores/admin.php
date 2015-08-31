<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedores', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#proveedores-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Proveedores</h1>

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
	'id'=>'proveedores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_proveedor',
		'nombre',
		array(
			'name' => 'rif',
			'value' => 'substr_replace($data->rif, "-", 1, 0)',
		),
		'telefono',
		'direccion',
		'email',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
