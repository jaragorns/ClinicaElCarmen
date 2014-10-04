<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */

$this->breadcrumbs=array(
	'Comprobantes'=>array('index'),
	$model->id_comprobante,
);

$this->menu=array(
	array('label'=>'Listar Comprobantes', 'url'=>array('index')),
	array('label'=>'Crear Comprobantes', 'url'=>array('create')),
	array('label'=>'Actualizar Comprobantes', 'url'=>array('update', 'id'=>$model->id_comprobante)),
	array('label'=>'Eliminar Comprobantes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_comprobante),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Comprobantes', 'url'=>array('admin')),
);
?>

<h1>Ver Comprobantes #<?php echo $model->id_comprobante; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_comprobante',
		'num_comprobante',
		'num_cheque',
		'monto',
		'fecha',
		'detalle',
		'estado',
		'usuarios_userid',
		'bancos_id_bancos',
	),
)); ?>
