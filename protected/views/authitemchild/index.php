<?php
/* @var $this AuthitemchildController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Authitemchildren',
);

$this->menu=array(
	array('label'=>'Crear Authitemchild', 'url'=>array('create')),
	array('label'=>'Gestionar Authitemchild', 'url'=>array('admin')),
);
?>

<h1>Authitemchildren</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
