<?php
/* @var $this BancosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bancos',
);
if(!(Yii::app()->user->role=="Accionista")){
$this->menu=array(
	array('label'=>'Crear Banco', 'url'=>array('create')),
	array('label'=>'Gestionar Bancos', 'url'=>array('admin')),
	array('label'=>'Gestionar Comprobantes', 'url'=>array('/comprobantes/admin')),
);
}
?>

<h1>Bancos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
