<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	$model->id_factura=>array('view','id'=>$model->id_factura),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Ver Facturas', 'url'=>array('view', 'id'=>$model->id_factura)),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Factura: <?php echo '#'.$model->num_factura; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>