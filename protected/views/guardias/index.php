<?php
/* @var $this GuardiasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Guardias',
);

$this->menu=array(
	array('label'=>'Crear Guardia', 'url'=>array('create')),
	array('label'=>'Gestionar Guardias', 'url'=>array('admin')),
);
?>

<h1>Guardias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
