<?php
/* @var $this TicketsController */
/* @var $model Tickets */

$this->breadcrumbs=array(
	'Ticket Generado',
);

$this->menu=array(
	array('label'=>'Crear Ticket', 'url'=>array('create'))
);
?>

<h1>Ticket Generado </h1>

<p class="note">Este ticket fue generado con la finalidad de solicitar una corrección a una descarga realizada durante su turno. 
	Debe esperar que sea procesado por el Usuario encargado.</p>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name' => 'Medicamento Nuevo',
			'value' =>  Medicamentos::model()->findByAttributes(array('id_medicamento'=>$model->id_medicamento))->nombre
		),
		array(
			'name' => 'Cantidad Nueva',
			'value' => $model->cantidad,
		),
		array(
            'name' => 'Estado del Ticket',
            'value' => strtr($model->estado, array("0" => "PENDIENTE","1" => "APROBADO","2" => "RECHAZADO")),
        ),
        array(
            'name' => 'Descarga Antereior',
            'value' => BitacoraDescargas::model()->findByAttributes(array('id_bitacora'=>$model->bitacora_descargas_id_bitacora))->StockInformation,
        ),
	),
)); ?>
