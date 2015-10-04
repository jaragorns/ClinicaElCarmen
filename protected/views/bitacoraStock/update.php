<?php
/* @var $this BitacoraStockController */
/* @var $model BitacoraStock */

$this->breadcrumbs=array(
	'Bitacora Stocks'=>array('index'),
	$model->id_bitacora_stock=>array('view','id'=>$model->id_bitacora_stock),
	'Update',
);

$this->menu=array(
	array('label'=>'List BitacoraStock', 'url'=>array('index')),
	array('label'=>'Create BitacoraStock', 'url'=>array('create')),
	array('label'=>'View BitacoraStock', 'url'=>array('view', 'id'=>$model->id_bitacora_stock)),
	array('label'=>'Manage BitacoraStock', 'url'=>array('admin')),
);
?>

<h1>Update BitacoraStock <?php echo $model->id_bitacora_stock; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>