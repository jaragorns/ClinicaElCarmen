<?php
/* @var $this BitacoraDescargasController */
/* @var $model BitacoraDescargas */

$this->breadcrumbs=array(
	'Bitacora Descargases'=>array('index'),
	$model->id_bitacora,
);

$this->menu=array(
	array('label'=>'List BitacoraDescargas', 'url'=>array('index')),
	array('label'=>'Create BitacoraDescargas', 'url'=>array('create')),
	array('label'=>'Update BitacoraDescargas', 'url'=>array('update', 'id'=>$model->id_bitacora)),
	array('label'=>'Delete BitacoraDescargas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bitacora),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BitacoraDescargas', 'url'=>array('admin')),
);
?>

<h1>View BitacoraDescargas #<?php echo $model->id_bitacora; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_bitacora',
		'fecha_hora',
		'cantidad',
		'estado',
		'id_stock',
		'id_guardia',
	),
)); ?>
