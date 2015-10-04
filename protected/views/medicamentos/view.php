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
	array('label'=>'Actualizar Medicamento', 'url'=>array('update', 'id'=>$model->id_medicamento)),
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
		array(
            'name' => 'unidad_medida',
            'value' => CHtml::encode(UnidadMedidas::model()->findByAttributes(array("id_unidad_medidas"=>$model->unidad_medida))->descripcion)
        ),
        'cantidad',
		'precio_contado',
		'precio_seguro',
		'iva',
	),
)); ?>
