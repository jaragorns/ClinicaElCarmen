<?php
/* @var $this VacacionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vacaciones',
);

$this->menu=array(
	array('label'=>'Crear Vacaciones', 'url'=>array('create')),
	array('label'=>'Gestionar Vacaciones', 'url'=>array('admin')),
);
?>

<h1>Vacaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
