<?php
/* @var $this BancosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bancoses',
);

$this->menu=array(
	array('label'=>'Crear Bancos', 'url'=>array('create')),
	array('label'=>'Gestionar Bancos', 'url'=>array('admin')),
);
?>

<h1>Bancoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
