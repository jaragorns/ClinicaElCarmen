<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */

$this->breadcrumbs=array(
	'Crear Comprobante',
);

$this->menu=array(
	array('label'=>'Gestionar Comprobantes', 'url'=>array('admin')),
);
?>

<h1>Crear Comprobante</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>