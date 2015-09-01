<?php
/* @var $this MedicamentosController */
/* @var $model Medicamentos */

$this->breadcrumbs=array(
	'Medicamentos'=>array('index'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>'Listar Medicamentos', 'url'=>array('index')),
	array('label'=>'Crear Medicamento', 'url'=>array('create')),
	array('label'=>'Atualizar Medicamentos', 'url'=>array('update', 'id'=>$model->id_medicamento)),
	array('label'=>'Eliminar Medicamentos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_medicamento),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Medicamentos', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_medicamento',
		'nombre',
		'componente',
		'unidad_medida',
		'precio_contado',
		'precio_seguro',
		'iva',
	),
)); ?>
