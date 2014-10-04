<?php
/* @var $this ComprobantesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comprobantes',
);

$this->menu=array(
	array('label'=>'Crear Comprobantes', 'url'=>array('create')),
	array('label'=>'Gestionar Comprobantes', 'url'=>array('admin')),
);
?>

<h1>Comprobantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
