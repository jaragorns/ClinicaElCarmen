<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Actualizar Factura',
);

$this->menu=array(
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Ver Facturas', 'url'=>array('view', 'id'=>$model->id_factura)),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Factura: <?php echo '#'.$model->num_factura; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 
										'items_1'=>$items_1, 
										'items_2'=>$items_2,
										'items_3'=>$items_3,
										'items_4'=>$items_4,
										'items_5'=>$items_5,
										'items_6'=>$items_6,
										'items_7'=>$items_7,
										'items_8'=>$items_8,
										'items_9'=>$items_9,
										'items_10'=>$items_10,
										'items_11'=>$items_11,
										'items_12'=>$items_12,
										'items_13'=>$items_13,
										'items_14'=>$items_14,
										'items_15'=>$items_15,
										'items_16'=>$items_16,
										'items_17'=>$items_17,
										'items_18'=>$items_18,
										'items_19'=>$items_19,
										'items_20'=>$items_20,
										'items_21'=>$items_21,
										'items_22'=>$items_22,
										'items_23'=>$items_23,
										'items_24'=>$items_24,
										'items_25'=>$items_25,
										'items_26'=>$items_26,
										'items_27'=>$items_27,
										'items_28'=>$items_28,
										'items_29'=>$items_29,
										'items_30'=>$items_30,
										)); 
?>