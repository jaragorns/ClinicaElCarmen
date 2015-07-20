<?php
/* @var $this TurnosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Turnoses',
);

$this->menu=array(
	array('label'=>'Crear Turno', 'url'=>array('create')),
	array('label'=>'Gestionar Turnos', 'url'=>array('admin')),
);
?>

<h1>Turnos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
