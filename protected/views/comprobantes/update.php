<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */

$this->breadcrumbs=array(
	'Comprobantes'=>array('index'),
	$model->id_comprobante=>array('view','id'=>$model->id_comprobante),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Comprobantes', 'url'=>array('index')),
	array('label'=>'Crear Comprobantes', 'url'=>array('create')),
	array('label'=>'Ver Comprobantes', 'url'=>array('view', 'id'=>$model->id_comprobante)),
	array('label'=>'Gestionar Comprobantes', 'url'=>array('admin')),
);
?>

<h1>Actualizar Comprobantes <?php echo $model->id_comprobante; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>