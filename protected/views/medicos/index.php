<?php
/* @var $this MedicosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Médicos',
);

$this->menu=array(
	array('label'=>'Crear Médicos', 'url'=>array('create')),
	array('label'=>'Gestionar Médicos', 'url'=>array('administrar')),
);
?>

<h1>Médicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
