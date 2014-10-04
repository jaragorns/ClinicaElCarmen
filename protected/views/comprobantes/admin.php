<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */

$this->breadcrumbs=array(
	'Comprobantes'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Comprobantes', 'url'=>array('index')),
	array('label'=>'Crear Comprobantes', 'url'=>array('create')),
	array('label'=>'Ver Saldos en Bancos', 'url'=>array('/bancos/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comprobantes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Comprobantes</h1>

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
	'id'=>'comprobantes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_comprobante',
		'num_comprobante',
		'num_cheque',
		'monto',
		'fecha',
		'detalle',
		'estado',
		/*
		'usuarios_userid',
		*/
		'bancos_id_bancos',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
