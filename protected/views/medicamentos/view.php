<?php
/* @var $this MedicamentosController */
/* @var $model Medicamentos */

$this->breadcrumbs=array(
	'Medicamentos',
);

$this->menu=array(
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
		array(
			'name' =>'precio_contado',
			'value' => str_replace(".",",",$model->precio_contado),
		),
		array(
			'name' =>'precio_seguro',
			'value' => str_replace(".",",",$model->precio_seguro),
		),
		'iva',
	),
)); ?>
