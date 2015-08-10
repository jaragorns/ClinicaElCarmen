<?php
/* @var $this GuardiasController */
/* @var $model Guardias */

$this->breadcrumbs=array(
	'Guardias'=>array('index'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Crear Guardia', 'url'=>array('create')),
	array('label'=>'Guardias', 'url'=>array('admin')),
);
?>

<h1>Modificar Guardia <?php echo $model->id_guardia; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>