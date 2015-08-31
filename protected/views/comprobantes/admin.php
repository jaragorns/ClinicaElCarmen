<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */

$this->breadcrumbs=array(
	'Comprobantes'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Crear Comprobante', 'url'=>array('create'), 
        'visible'=>Yii::app()->user->role=="Superadmin", 
        'visible'=>Yii::app()->user->role=="Administrador"),
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

<?php
    Yii::import('application.extensions.eeditable.*');
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comprobantes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'afterAjaxUpdate'=>new CJavaScriptExpression("function(id){ $('#'+id).EEditable(); }"),
	'columns'=>array(
        array(
            'name'  => 'num_comprobante',
            'htmlOptions' => array('style'=>'width:20px;'),
        ),
        array(
            'name'  => 'num_cheque',
            'htmlOptions' => array('style'=>'width:80px;'),
        ),
        array(
            'name' => 'bancos_id_bancos',
            'value' => 'Bancos::model()->findByAttributes(array("id_bancos"=>$data->bancos_id_bancos))->nombre'
        ),
        array(
            'name'  => 'monto',
            'value' => 'str_replace(".",",",$data->monto)',
            'htmlOptions' => array('style'=>'text-align: right;'),
        ),
        array(
            'name'  => 'fecha',
            'value' => 'date_format(date_create($data->fecha), "d-m-Y")',
            'htmlOptions' => array('style'=>'text-align: right;'),
        ),
        'detalle',
        array(
            'name'=>'estado_med',
            'class'=>'EEditableColumn', 'editable_type'=>'select',
            'editable_options'=>array('EN ESPERA'=>'-ELEGIR-','APROBADO'=>'APROBADO','RECHAZADO'=>'RECHAZADO'),
            'action'=>array('Comprobantes/ajaxeditcolumnMedina'),
        ),
        array(
            'name'=>'estado_pra',
            'class'=>'EEditableColumn', 'editable_type'=>'select',
            'editable_options'=>array('EN ESPERA'=>'-ELEGIR-','APROBADO'=>'APROBADO','RECHAZADO'=>'RECHAZADO'),
            'action'=>array('Comprobantes/ajaxeditcolumnPrada'),
        ),
        array(
			'class'=>'CButtonColumn',
		),
        /*EDITBOX
        array(
            'name'=>'estado_med',
            'class'=>'EEditableColumn', 'editable_type'=>'editbox',
            'action'=>array('Comprobantes/ajaxeditcolumn'),
        ),
        */
	),
)); ?>


