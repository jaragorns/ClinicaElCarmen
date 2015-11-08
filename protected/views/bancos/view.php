<?php
/* @var $this BancosController */
/* @var $model Bancos */

$this->breadcrumbs=array(
	'Bancos'=>array('index'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>'Listar Bancos', 'url'=>array('index')),
	array('label'=>'Crear Banco', 'url'=>array('create'),
        'visible'=>Yii::app()->user->role=="Presidente",
		'visible'=>Yii::app()->user->role=="Superadmin"),
	array('label'=>'Actualizar Banco', 'url'=>array('update', 'id'=>$model->id_bancos)),
	array('label'=>'Gestionar Bancos', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_bancos',
		'nombre',
		array(
			'name' =>'saldo',
			'value' => str_replace(".",",",$model->saldo),
		),
		array(
            'name' => 'fecha_actualizacion',
            'value' => date_format(date_create($model->fecha_actualizacion), "d-m-Y g:ia")
        ),	
	),
)); ?>
