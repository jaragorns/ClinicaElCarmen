<?php
/* @var $this TicketsController */
/* @var $model Tickets */

$this->breadcrumbs=array(
	'Crear Ticket',
);

?>

<h1>Crear Ticket</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>