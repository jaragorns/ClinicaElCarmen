<?php
/* @var $this MedicamentosController */
/* @var $model Medicamentos */

$this->breadcrumbs=array(
	'Medicamentos'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Medicamentos', 'url'=>array('index')),
	array('label'=>'Crear Medicamento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#medicamentos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Medicamentos</h1>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'medicamentos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_medicamento',
		'nombre',
		'componente',
		array(
            'name' => 'unidad_medida',
            'value' => 'UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>$data->unidad_medida))->descripcion'
        ),
        'cantidad',
        array(
            'name' => 'precio_contado',
            'value' => 'str_replace(".",",",$data->precio_contado)',
        ),
		array(
            'name' => 'precio_seguro',
            'value' => 'str_replace(".",",",$data->precio_seguro)',
        ),
        array(
            'name' => 'iva',
            'value' => 'str_replace(".",",",$data->iva)',
        ),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
