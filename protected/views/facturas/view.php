<?php
/* @var $this FacturasController */
/* @var $model Facturas */

$this->breadcrumbs=array(
	'Factura'=>array('index'),
	'#'.$model->num_factura,
);

$this->menu = array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Actualizar Factura', 'url'=>array('update', 'id'=>$model->id_factura)),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
	
);

?>

<h1>Factura #<?php echo $model->num_factura; ?></h1>

	<table>
		<tr>
			<td></td>
			<td></td>
	    	<td> <b><?php echo $model->getAttributeLabel('control_factura'); ?> </b></td>
	    	<td> <?php echo $model->control_factura; ?> </td>
	    	<td> <b><?php echo $model->getAttributeLabel('fecha_entrada'); ?> </b></td>
			<td> <?php echo $model->fecha_entrada; ?> </td>
	  	</tr>
	  	<tr>
		  	<td> <b><?php echo $model->getAttributeLabel('id_proveedor'); ?> </b></td>	
			<td> <?php echo $model->idProveedor->nombre; ?> </td>
		    <td> <b><?php echo $model->getAttributeLabel('num_factura'); ?> </b></td>
		   	<td> <?php echo $model->num_factura; ?> </td>
		    <td> <b><?php echo $model->getAttributeLabel('fecha_factura'); ?> </b></td>	
			<td> <?php echo $model->fecha_factura; ?> </td>
	  	</tr>
	  	<tr>
	  		<td></td>
	  		<td></td>
	  		<td></td>
	  		<td></td>
	  		<td> <b><?php echo $model->getAttributeLabel('fecha_vencimiento'); ?> </b></td>	
			<td> <?php echo $model->fecha_vencimiento; ?> </td>
	  	</tr>
	</table>

 <h3>Detalle</h3>

	<table>
		<tr>
			<td>
				<?php 
					//echo $form->hiddenField($items_1,'[0]id_medicamento',array());

					if(!empty($model->id_medicamento)){
						$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$model->id_medicamento))->nombre;
						$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$model->id_medicamento))->iva;
					}else{
						$medicamento = "";
						$iva = "";
					}

					$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	    				'name'=>'nombre_1',
	    				'value'=>$medicamento,
	    				'model'=>$model,
	    				'source'=>$this->createUrl('Facturas/Autocomplete'),
	    				// additional javascript options for the autocomplete plugin
	    				'options'=>array(
	    					'minLength'=>'1',
	            			'showAnim'=>'fold',
	            			'select'=>"js:function(event, ui) { 
   								$('#Inventario_0_id_medicamento').val(ui.item.id_medicamento); 
   								$('#Inventario_0_iva').val(ui.item.iva);
   							}"
	    				),
	    				'htmlOptions'=>array(
    						'style'=>'width:436px;',
    						'placeholder'=>'Nombre del medicamento...',
    						'title'=>'Indique el medicamento que desea agregar a la factura.'
						),
					));
				?>
			</td>
		</tr>
	</table>