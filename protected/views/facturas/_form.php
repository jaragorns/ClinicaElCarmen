<?php
/* @var $this FacturasController */
/* @var $model Facturas */
/* @var $form CActiveForm */
?>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php if($form->errorSummary($model)!=""){ ?>
	<div class="alert alert-info">
    	<strong><?php echo $form->errorSummary($model);?></strong> 
    </div>
	<?php } ?>

		<table style="width:100%">
			<tr>
				<td></td>
				<td></td>
		    	<td>
		    		<?php echo $form->labelEx($model,'control_factura'); ?>
		    	</td>
		    	<td>
					<?php echo $form->textField($model,'control_factura',array('size'=>20,'maxlength'=>20)); ?>
					<?php echo $form->error($model,'control_factura'); ?>
				</td>
		    	<td>
				    <?php echo $form->labelEx($model,'fecha_entrada'); ?>
				</td>
				<td>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker', 
						array(
							'attribute'=>'fecha_entrada',
			                'model'=>$model,
			                'value' => $model->fecha_entrada,
			                'language'=>'es',
			                'options'=>array (
			                    'showSecond'=>true,
			                    'dateFormat'=>'yy-mm-dd',
			                	),  
			            	)   
			        	);
					?>
					<?php echo $form->error($model,'fecha_entrada'); ?>
				</td>
		  	</tr>
		  	<tr>
			  	<td>
					<?php echo $form->labelEx($model,'id_proveedor'); ?>
				</td>	
				<td>
					<?php echo $form->dropDownList(
								$model,
								'id_proveedor',
								CHtml::listData(
									Proveedores::model()->findAll(),
									'id_proveedor',
									'nombre'),
								array(
									'class' => 'my-drop-down',
									'empty'=>'-- Seleccione un Proveedor --',
								)
							);
						?> 
					<?php echo $form->error($model,'id_proveedor'); ?>
				</td>
			    <td>
			    	<?php echo $form->labelEx($model,'num_factura'); ?>
			    </td>
			   	<td>
					<?php echo $form->textField($model,'num_factura',array('size'=>20,'maxlength'=>20)); ?>
					<?php echo $form->error($model,'num_factura'); ?>
				</td> 
			    <td>
					<?php echo $form->labelEx($model,'fecha_factura'); ?>
				</td>
				<td>
					<?php 
						$this->widget('zii.widgets.jui.CJuiDatePicker', 
							array(
								'attribute'=>'fecha_factura',
				                'model'=>$model,
				                'value' => $model->fecha_factura,
				                'language'=>'es',
				                'options'=>array (
				                    'showSecond'=>true,
				                    'dateFormat'=>'yy-mm-dd',
				                ),  
			            	)	   
			        	);
					?>
					<?php echo $form->error($model,'fecha_factura'); ?>
				</td>
		  	</tr>
		  	<tr>
		  		<td></td>
		  		<td></td>
		  		<td></td>
		  		<td></td>
		  		<td>
					<?php echo $form->labelEx($model,'fecha_vencimiento'); ?>
				</td>
				<td>
					<?php 
						$this->widget('zii.widgets.jui.CJuiDatePicker', 
							array(
								'attribute'=>'fecha_vencimiento',
				                'model'=>$model,
				                'value' => $model->fecha_vencimiento,
				                'language'=>'es',
				                'options'=>array (
				                    'showSecond'=>true,
				                    'dateFormat'=>'yy-mm-dd',
				                ),  
				            )   
				        );
					?>
					<?php echo $form->error($model,'fecha_vencimiento'); ?>
		  		</td>
		  	</tr>
		</table>

		 <h3>Detalle</h3>

		<table>
			<tr>
				<th><?php echo $form->labelEx($items_1,'id_medicamento'); ?></th>
				<th><?php echo $form->labelEx($items_1,'cantidad'); ?></th>
				<th><?php echo $form->labelEx($items_1,'precio_compra'); ?></th>
				<th><?php echo $form->labelEx($items_1,'total'); ?></th>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_1,'id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_1,'cantidad', array('size'=>20)); ?></td>
				<td><?php echo $form->textField($items_1,'precio_compra', array('size'=>20)); ?></td>	
				<td><?php echo $form->textField($items_1,'total', array('size'=>30)); ?></td>
			</tr>
			
			
		</table>

		<div class="rowcontact">
			<?php echo $form->labelEx($model,'monto'); ?>
		</div>
		<div class="media">
			<?php echo $form->textField($model,'monto'); ?>
			<?php echo $form->error($model,'monto'); ?>
		</div>
		<?php 
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    				'name'=>'medicamento',
    				'value'=>'',
    				//'source'=>array('ac1', 'ac2', 'ac3'),
    				'source'=>$this->createUrl('Facturas/Ajax3'),
    				// additional javascript options for the autocomplete plugin
    				'options'=>array(
    					'minLength'=>'1',
            			'showAnim'=>'fold',
    				),
				));
			?>
		
		<div class="buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
		</div>

		

		

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

 	$(document).ready(function(){
 		//var val1 = document.getElementById('cantidad').value;
 		/*
      	var val1 = $("#facturas_precio_compra").val();
      	var val2 = $("#facturas_precio_compra").val();
      	$(".input").keyup(function(){
      		window.alert(5 + 6);
         	$("#facturas_Inventario_total").text(val1+val2);
      	});

      	document.getElementById("total").innerHTML = 5 + 6;
      	*/
	});

	function checkval() {
		//var val1 = document.querySelector('#Inventario_cantidad').value;
		//var val2 = document.querySelector('#Inventario_precio_compra').value;

		//var cantidad = $(obj).attr("Inventario_precio_compra");
		//document.write($(obj).attr("Inventario_precio_compra"));

		//alert(cantidad);

		//var total = val1 * val2;
		//$("#Inventario_total").val(total);
	}
</script>