<?php
/* @var $this FacturasController */
/* @var $model Facturas */
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/libre.css');

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

	<table class="ancho">
		<tr>
			<td></td>
			<td></td>
	    	<td class="control"> <b><?php echo $model->getAttributeLabel('control_factura'); ?> </b></td>
	    	<td class="numF"> <?php echo $model->control_factura; ?> </td>
	    	<td class="control"> <b><?php echo $model->getAttributeLabel('fecha_entrada'); ?> </b></td>
			<td class="numF"> <?php echo date_format(date_create($model->fecha_entrada),'d-m-Y'); ?> </td>
	  	</tr>
	  	<tr>
		  	<td class="proveedor"> <b><?php echo $model->getAttributeLabel('id_proveedor'); ?> </b></td>	
			<td class="nomP"> <?php echo $model->idProveedor->nombre; ?> </td>
		    <td class="control"> <b><?php echo $model->getAttributeLabel('num_factura'); ?> </b></td>
		   	<td class="numF"> <?php echo $model->num_factura; ?> </td>
		    <td class="control"> <b><?php echo $model->getAttributeLabel('fecha_factura'); ?> </b></td>	
			<td class="numF"> <?php echo date_format(date_create($model->fecha_factura),'d-m-Y'); ?> </td>
	  	</tr>
	  	<tr>
	  		<td></td>
	  		<td></td>
	  		<td></td>
	  		<td></td>
	  		<td class="control"> <b><?php echo $model->getAttributeLabel('fecha_vencimiento'); ?> </b></td>	
			<td class="numF"> <?php echo date_format(date_create($model->fecha_vencimiento),'d-m-Y'); ?> </td>
	  	</tr>
	</table>

 <h3>Detalle</h3>

 	<?php
 		$data = Inventario::model()->findAllBySql("SELECT * FROM inventario WHERE id_factura='".$model->num_factura."'"); 
 	?>

	<table class="ancho">
		<tr>
			<th class="align"><b>Medicamento</b></th>
			<th class="align"><b>IVA</b></th>
			<th class="align"><b>Cantidad</b></th>
			<th class="align"><b>Precio de Compra</b></th>
			<th class="align"><b>Total</b></th>
		</tr>
		<?php 

		for ($i=0; $i < count($data); $i++) { 
			if(fmod($i,2)==0){	?>
		
		<tr>
			<td class="medicamento"><?php echo Medicamentos::model()->findByAttributes(array('id_medicamento'=>$data[$i]["id_medicamento"]))->nombre; ?></td>
			<td class="iva"><?php echo Medicamentos::model()->findByAttributes(array('id_medicamento'=>$data[$i]["id_medicamento"]))->iva; ?></td>
			<td class="cantidad"><?php echo $data[$i]["cantidad"]; ?></td>
			<td class="precio_compra"><?php echo $data[$i]["precio_compra"]; ?></td>
			<td class="total"><?php echo $data[$i]["total"]; ?></td>
		</tr>	
		<?php	
		}else{
		?>		
		<tr>
			<td class="medicamentoC"><?php echo Medicamentos::model()->findByAttributes(array('id_medicamento'=>$data[$i]["id_medicamento"]))->nombre; ?></td>
			<td class="ivaC"><?php echo Medicamentos::model()->findByAttributes(array('id_medicamento'=>$data[$i]["id_medicamento"]))->iva; ?></td>
			<td class="cantidadC"><?php echo $data[$i]["cantidad"]; ?></td>
			<td class="precio_compraC"><?php echo $data[$i]["precio_compra"]; ?></td>
			<td class="totalC"><?php echo $data[$i]["total"]; ?></td>
		</tr>	
		<?php	
			}
		}
		?>				
	</table>
	<br>
	<table class="ancho">
		<tr>
			<td class="retencion"><b>Retención: </b>
				<?php 
				if($model->retencion==1)
					echo "75 %";
				elseif($model->retencion==2)
					echo "100 %";
				else
					echo "Sin Retención";
				?>
			</td>
			<td class="totalF"><b>Total Factura: </b> <?php echo $model->monto; ?></td>
		</tr>
	</table>			