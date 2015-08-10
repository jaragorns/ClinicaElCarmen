<?php
/* @var $this UnidadMedidasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Unidad de Medidas',
);

$this->menu=array(
	array('label'=>'Crear Unidad de Medidas', 'url'=>array('create')),
	array('label'=>'Gestionar Unidad de Medidas', 'url'=>array('admin')),
);
?>

<h1>Unidad de Medidas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
