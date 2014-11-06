<?php
/* @var $this MedicosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Medicoses',
);

$this->menu=array(
	array('label'=>'Create Medicos', 'url'=>array('create')),
	array('label'=>'Manage Medicos', 'url'=>array('admin')),
);
?>

<h1>Medicoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
