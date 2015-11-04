<?php
/* @var $this BancosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bancos',
);
$this->menu=array(
	array('label'=>'Crear Banco', 'url'=>array('create'),
		'visible'=>Yii::app()->user->role=="Superadmin", Yii::app()->user->role=="Presidente", Yii::app()->user->role=="Vicepresidente"),
	array('label'=>'Gestionar Bancos', 'url'=>array('admin'),
		'visible'=>Yii::app()->user->role=="Superadmin", Yii::app()->user->role=="Presidente", Yii::app()->user->role=="Vicepresidente"),
	array('label'=>'Gestionar Comprobantes', 'url'=>array('/comprobantes/admin'),
		'visible'=>Yii::app()->user->role=="Superadmin", Yii::app()->user->role=="Presidente", Yii::app()->user->role=="Vicepresidente"),
);

?>

<h1>Bancos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
