<?php
/* @var $this BancosController */
/* @var $model Bancos */

$this->breadcrumbs=array(
	'Bancos'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Bancos', 'url'=>array('index')),
	array('label'=>'Crear Banco', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#bancos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Bancos</h1>

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
	'id'=>'bancos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_bancos',
		'nombre',
		'saldo',
		'fecha_actualizacion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<!--
	array(
			'name' => 'fecha_actualizacion',
			'type' => 'raw',
			'htmlOptions' => array('class'=>'datetime_cell'),
			'value' => 'Yii::app()->lc->toLocal($data->c_datetime, "fecha_actualizacion", "small")',
		),
-->