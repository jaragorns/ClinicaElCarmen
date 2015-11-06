<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */

$this->breadcrumbs=array(
	'Actualizar Comprobantes',
);

$this->menu=array(
	array('label'=>'Crear Comprobante', 'url'=>array('create'), 
        'visible'=>Yii::app()->user->role=="Superadmin", 
        'visible'=>Yii::app()->user->role=="Administrador"),
	array('label'=>'Ver Comprobante', 'url'=>array('view', 'id'=>$model->id_comprobante)),
	array('label'=>'Gestionar Comprobantes', 'url'=>array('admin')),
);
?>

<h1>Actualizar Comprobante <?php echo $model->num_comprobante; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>