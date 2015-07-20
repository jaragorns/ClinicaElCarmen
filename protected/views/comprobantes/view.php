<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */

$this->breadcrumbs=array(
	'Comprobantes'=>array('index'),
	$model->id_comprobante,
);

$this->menu=array(
	array('label'=>'Crear Comprobante', 'url'=>array('create'), 
        'visible'=>Yii::app()->user->role=="Superadmin", 
        'visible'=>Yii::app()->user->role=="Administrador"),
	array('label'=>'Actualizar Comprobante', 'url'=>array('update', 'id'=>$model->id_comprobante), 
		'visible'=>Yii::app()->user->role=="Superadmin",
		'visible'=>Yii::app()->user->role=="Administrador"),
	//array('label'=>'Eliminar Comprobantes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_comprobante),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Comprobantes', 'url'=>array('admin')),
);
?>

<h1>Comprobante #<?php echo $model->num_comprobante; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_comprobante',
		'num_comprobante',
		'num_cheque',
		'monto',
		'fecha',
		'detalle',
		'estado_med',
		'estado_pra',
		array(
			'name' => 'usuarios_username',
			'value' => Usuarios::model()->findByAttributes(array('id'=>$model->usuarios_username))->nombres.' '.
						Usuarios::model()->findByAttributes(array('id'=>$model->usuarios_username))->apellidos
		),
		array(
			'name' => 'bancos_id_bancos',
			'value' => Bancos::model()->findByAttributes(array('id_bancos'=>$model->bancos_id_bancos))->nombre
		),
	),
)); ?>
