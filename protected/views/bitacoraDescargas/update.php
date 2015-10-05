<?php
/* @var $this BitacoraDescargasController */
/* @var $model BitacoraDescargas */

$this->breadcrumbs=array(
	'Bitacora Descargases'=>array('index'),
	$model->id_bitacora=>array('view','id'=>$model->id_bitacora),
	'Update',
);

$this->menu=array(
	array('label'=>'List BitacoraDescargas', 'url'=>array('index')),
	array('label'=>'Create BitacoraDescargas', 'url'=>array('create')),
	array('label'=>'View BitacoraDescargas', 'url'=>array('view', 'id'=>$model->id_bitacora)),
	array('label'=>'Manage BitacoraDescargas', 'url'=>array('admin')),
);
?>

<h1>Update BitacoraDescargas <?php echo $model->id_bitacora; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>