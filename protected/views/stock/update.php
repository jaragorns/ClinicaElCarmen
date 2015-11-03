<?php
/* @var $this StockController */
/* @var $model Stock */

$this->breadcrumbs=array(
	'Stocks'=>array('index'),
	$model->id_stock=>array('view','id'=>$model->id_stock),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Crear Stock', 'url'=>array('create')),
	array('label'=>'Ver Stock', 'url'=>array('view', 'id'=>$model->id_stock)),
	array('label'=>'Gestionar Stock', 'url'=>array('admin')),
);
?>

<h1>Actualizar Stock <?php echo $model->id_stock; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>