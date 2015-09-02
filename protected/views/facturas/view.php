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
			<th><?php echo $form->labelEx($items_1,'[0]id_medicamento'); ?></th>
			<th><?php echo Chtml::label('IVA *', 'IVA', array()); ?></th>
			<th><?php echo $form->labelEx($items_1,'[0]cantidad'); ?></th>
			<th><?php echo $form->labelEx($items_1,'[0]precio_compra'); ?></th>
			<th><?php echo $form->labelEx($items_1,'[0]total'); ?></th>
		</tr>
		<tr>
			<td>
				<?php 
					echo $form->hiddenField($items_1,'[0]id_medicamento',array());

					if(!empty($items_1->id_medicamento)){
						$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_1->id_medicamento))->nombre;
						$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_1->id_medicamento))->iva;
					}else{
						$medicamento = "";
						$iva = "";
					}

					$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	    				'name'=>'nombre_1',
	    				'value'=>$medicamento,
	    				'model'=>$items_1,
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
			<td><?php echo Chtml::textField('[0]iva', $iva, array('id'=>'Inventario_0_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
			<td><?php echo $form->textField($items_1,'[0]cantidad', array('id'=>'items_1_cantidad','size'=>20, 'onblur'=>'checkval(1)')); ?></td>
			<td><?php echo $form->textField($items_1,'[0]precio_compra', array('id'=>'items_1_precio','size'=>20, 'onblur'=>'checkval(1)')); ?></td>	
			<td><?php echo $form->textField($items_1,'[0]total', array('id'=>'items_1_total','size'=>30, 'readonly'=>'disable')); ?></td>
		</tr>
	</table>