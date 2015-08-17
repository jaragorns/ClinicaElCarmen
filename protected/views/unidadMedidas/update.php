<?php
/* @var $this UnidadMedidasController */
/* @var $model UnidadMedidas */

$this->breadcrumbs=array(
	'Unidad de Medidas'=>array('index'),
	$model->descripcion,
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Unidad de Medidas', 'url'=>array('index')),
	array('label'=>'Crear Unidad de Medidas', 'url'=>array('create')),
	array('label'=>'Ver Unidad de Medidas', 'url'=>array('view', 'id'=>$model->id_unidad_medidas)),
	array('label'=>'Gestionar Unidad de Medidas', 'url'=>array('admin')),
);
?>

<h1>Actualizar: <?php echo $model->descripcion."(".$model->abreviatura.")"; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>