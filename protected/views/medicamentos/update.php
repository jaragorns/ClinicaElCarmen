<?php
/* @var $this MedicamentosController */
/* @var $model Medicamentos */

$this->breadcrumbs=array(
	'Modificar Medicamentos',
);

$this->menu=array(
	array('label'=>'Crear Medicamento', 'url'=>array('create')),
	array('label'=>'Ver Medicamento', 'url'=>array('view', 'id'=>$model->id_medicamento)),
	array('label'=>'Gestionar Medicamentos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Medicamento: <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>