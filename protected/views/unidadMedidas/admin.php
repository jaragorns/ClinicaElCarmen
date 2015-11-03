<?php
/* @var $this UnidadMedidasController */
/* @var $model UnidadMedidas */

$this->breadcrumbs=array(
	'Unidad de Medidas'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Unidad de Medidas', 'url'=>array('index')),
	array('label'=>'Crear Unidad de Medidas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#unidad-medidas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Unidad de Medidas</h1>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unidad-medidas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_unidad_medidas',
		'descripcion',
		'abreviatura',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
