<?php
/* @var $this TicketsController */
/* @var $model Tickets */

$this->breadcrumbs=array(
	'Gestionar Tickets',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tickets-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Tickets</h1>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tickets-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'header' => 'Medicamento Nuevo',
			'name' => 'id_medicamento',
			'value' => 'Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->nombre'
		),
		array(
			'header' => 'Cantidad Nueva',
			'name' => 'cantidad',
			'value' => '$data->cantidad." (".UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->unidad_medida))->descripcion.")"'
		),
		array(
            'name' => 'estado',
            'value' => 'strtr($data->estado, array("0" => "Pendiente","1" => "Aprobado","2" => "Rechazado"))',
        ),
         array(
            'header' => 'Descarga Anterior',
            'value' => 'BitacoraDescargas::model()->findByAttributes(array("id_bitacora"=>$data->bitacora_descargas_id_bitacora))->StockInformation',
        ),
        array(
        	'header'=>'',
        	'value'=>'CHTML::button("Aprobar" ,array("submit"=>array("tickets/aprobar/ticket/".$data->id_ticket), "class"=>"btn btn-primary btn-large"))',
        	'type'=>'raw',
        	'htmlOptions'=>array('width'=>'20px'),
      	),
      	array(
        	'header'=>'',
        	'value'=>'CHTML::button("Rechazar" ,array("submit"=>array("tickets/rechazar/ticket/".$data->id_ticket), "class"=>"btn btn-primary btn-large"))',
        	'type'=>'raw',
        	'htmlOptions'=>array('width'=>'20px'),
      	),
	),
)); ?>
