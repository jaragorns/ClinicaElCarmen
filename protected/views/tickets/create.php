<?php
/* @var $this TicketsController */
/* @var $model Tickets */

$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	'Crear',
);

?>

<h1>Crear Tickets</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>