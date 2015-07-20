<?php
/* @var $this BancosController */
/* @var $model Bancos */

$this->breadcrumbs=array(
	'Bancos'=>array('index'),
	$model->nombre,
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Bancos', 'url'=>array('index')),
	array('label'=>'Crear Banco', 'url'=>array('create')),
	array('label'=>'Ver Banco', 'url'=>array('view', 'id'=>$model->id_bancos)),
	array('label'=>'Gestionar Bancos', 'url'=>array('admin')),
);
?>

<h1>Actualizar <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>