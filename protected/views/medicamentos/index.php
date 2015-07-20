<?php
/* @var $this MedicamentosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Medicamentos',
);

$this->menu=array(
	array('label'=>'Crear Medicamentos', 'url'=>array('create')),
	array('label'=>'Gestionar Medicamentos', 'url'=>array('admin')),
);
?>

<h1>Medicamentos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
