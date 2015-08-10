<?php
/* @var $this GuardiasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Guardiases',
);

$this->menu=array(
	array('label'=>'Create Guardias', 'url'=>array('create')),
	array('label'=>'Manage Guardias', 'url'=>array('admin')),
);
?>

<h1>Guardiases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
