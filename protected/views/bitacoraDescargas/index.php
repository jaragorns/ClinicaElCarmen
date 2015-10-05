<?php
/* @var $this BitacoraDescargasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bitacora Descargases',
);

$this->menu=array(
	array('label'=>'Create BitacoraDescargas', 'url'=>array('create')),
	array('label'=>'Manage BitacoraDescargas', 'url'=>array('admin')),
);
?>

<h1>Bitacora Descargases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
