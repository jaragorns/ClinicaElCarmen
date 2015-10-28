<?php
/* @var $this BitacoraDescargasController */
/* @var $model BitacoraDescargas */

$this->breadcrumbs=array(
	'Gestión Bitacora Descargas',
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

<h1>Gesti&oacute;n de Bitacora Descargas</h1>

<p>
Tambi&eacute;n puede escribir un operador de comparaci&oacute;n  (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
&oacute; <b>=</b>) en el comienzo de cada uno de los valores de b&uacute;squeda para especificar c&oacute;mo se debe hacer la comparaci&oacute;n.
</p>

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
            'name'  => 'fecha_hora',
            'value' => 'date_format(date_create($data->fecha_hora), "d-m-Y g:ia")',
        ),
		'cantidad',
		array(
            'name' => 'estado',
            'value' => 'strtr($data->estado, array("0" => "INACTIVO","1" => "DESCARGADO"))',
        ),
		array(
			'header' => 'Medicamento',
			'value' => 'Medicamentos::model()->findByAttributes(array("id_medicamento"=>Stock::model()->findByAttributes(array("id_stock"=>$data->id_stock))->id_medicamento))->nombre'
		),
		array(
			'header' => 'Servicio',
			'value' => 'Estaciones::model()->findByAttributes(array("id_estacion"=>Guardias::model()->findByAttributes(array("id_guardia"=>$data->id_guardia))->id_estacion))->nombre',
		),
		array(
			'header' => 'Usuario',
			'value' => 'Usuarios::model()->findByAttributes(array("id"=>Guardias::model()->findByAttributes(array("id_guardia"=>$data->id_guardia))->id_usuario))->NombreCompleto',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
