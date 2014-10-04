<?php
/* @var $this BancosController */
/* @var $model Bancos */

$this->breadcrumbs=array(
	'Bancoses'=>array('index'),
	$model->id_bancos=>array('view','id'=>$model->id_bancos),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Bancos', 'url'=>array('index')),
	array('label'=>'Crear Bancos', 'url'=>array('create')),
	array('label'=>'Ver Bancos', 'url'=>array('view', 'id'=>$model->id_bancos)),
	array('label'=>'Gestionar Bancos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Bancos <?php echo $model->id_bancos; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>