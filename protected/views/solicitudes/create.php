<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */

$this->breadcrumbs=array(
	'Solicitudes',
	'Crear Solicitud',
);

$this->menu=array(
	array('label'=>'Mis Solicitudes', 'url'=>array('admin')),
	array('label'=>'Solicitudes Pendientes', 'url'=>array('adminPendiente')),
);
?>

<h1>Crear Solicitud</h1>
<br>
<div class="alert alert-info">
			<p><strong>Si alguno(s) de los medicamentos a solicitar no se encuentra(n) 
				disponible(s) en el servicio no podr&aacute; completar o realizar su solicitud.</strong></p>
			</div>
<?php $this->renderPartial('_form', array('model'=>$model,
										'items_0'=>$items_0,
										'items_1'=>$items_1, 
										'items_2'=>$items_2,
										'items_3'=>$items_3,
										'items_4'=>$items_4,
										'items_5'=>$items_5,
										'items_6'=>$items_6,
										'items_7'=>$items_7,
										'items_8'=>$items_8,
										'items_9'=>$items_9,
										)); ?>