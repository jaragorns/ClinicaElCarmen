<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->username=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index'),
		'visible'=>Yii::app()->user->role=="Superadmin", Yii::app()->user->role=="Administrador", 
					Yii::app()->user->role=="Vicepresidente", Yii::app()->user->role=="Presidente"),
	array('label'=>'Crear Usuarios', 'url'=>array('create'),
		'visible'=>Yii::app()->user->role=="Superadmin", Yii::app()->user->role=="Administrador", 
					Yii::app()->user->role=="Vicepresidente", Yii::app()->user->role=="Presidente"),
	array('label'=>'Ver Usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Usuarios', 'url'=>array('admin'),
		'visible'=>Yii::app()->user->role=="Superadmin", Yii::app()->user->role=="Administrador", 
					Yii::app()->user->role=="Vicepresidente", Yii::app()->user->role=="Presidente"),
);
?>

<h1>Actualizar Usuario: <?php echo $model->nombres." ".$model->apellidos; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'rol_user'=>$rol_user)); ?>