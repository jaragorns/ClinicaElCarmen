<?php
/* @var $this UnidadMedidasController */
/* @var $model UnidadMedidas */

$this->breadcrumbs=array(
	'Unidad Medidases'=>array('index'),
	$model->descripcion,
);

$this->menu=array(
	array('label'=>'Crear Unidad de Medidas', 'url'=>array('create')),
	array('label'=>'Actualizar Unidad de Medidas', 'url'=>array('update', 'id'=>$model->id_unidad_medidas)),
	array('label'=>'Gestionar Unidad de Medidas', 'url'=>array('admin')),
);
?>

<h1>Unidad de Medida: <?php echo $model->descripcion."(".$model->abreviatura.")"; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_unidad_medidas',
		'descripcion',
		'abreviatura',
	),
)); ?>
