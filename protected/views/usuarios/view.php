<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuario',
	$model->username,
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index'),
		'visible'=>Yii::app()->user->role=="Superadmin", Yii::app()->user->role=="Administrador", 
					Yii::app()->user->role=="Vicepresidente", Yii::app()->user->role=="Presidente"),
	array('label'=>'Crear Usuarios', 'url'=>array('create'),
		'visible'=>Yii::app()->user->checkAccess('CrearUsuario')),
	array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->id),
		'visible'=>Yii::app()->user->checkAccess('ModificarUsuario')),
	array('label'=>'Gestionar Usuarios', 'url'=>array('admin'),
		'visible'=>Yii::app()->user->role=="Superadmin", Yii::app()->user->role=="Administrador", 
					Yii::app()->user->role=="Vicepresidente", Yii::app()->user->role=="Presidente"),
);
?>

<h1>Usuario: <?php echo $model->nombres." ".$model->apellidos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'username',
		//'password',
		'cargo',
		'nombres',
		'apellidos',
		'telefono',
		'email',
		array(
			'name' => 'description_role',
			'value' => CHtml::encode(AuthAssignment::model()->findByAttributes(array('userid'=>$model->id))->itemname)
		),
	),
)); ?>
