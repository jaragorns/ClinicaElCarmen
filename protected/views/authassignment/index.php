<?php
/* @var $this AuthassignmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Authassignments',
);

$this->menu=array(
	array('label'=>'Crear Authassignment', 'url'=>array('create')),
	array('label'=>'Gestionar Authassignment', 'url'=>array('admin')),
);
?>

<h1>Authassignments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
