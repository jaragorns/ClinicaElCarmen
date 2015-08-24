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
    	<strong><?php // echo $form->errorSummary($model);?></strong> 
    </div>
	<?php } ?>
	<?php echo $form->errorSummary(array($model, $items_1, $items_2));?>
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
				<th><?php echo $form->labelEx($items_1,'[0]id_medicamento'); ?></th>
				<th><?php echo $form->labelEx($items_1,'[0]cantidad'); ?></th>
				<th><?php echo $form->labelEx($items_1,'[0]precio_compra'); ?></th>
				<th><?php echo $form->labelEx($items_1,'[0]total'); ?></th>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_1,'[0]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_1,'[0]cantidad', array('id'=>'items_1_cantidad','size'=>20, 'onblur'=>'checkval(1)')); ?></td>
				<td><?php echo $form->textField($items_1,'[0]precio_compra', array('id'=>'items_1_precio','size'=>20, 'onblur'=>'checkval(1)')); ?></td>	
				<td><?php echo $form->textField($items_1,'[0]total', array('id'=>'items_1_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_2,'[1]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_2,'[1]cantidad', array('id'=>'items_2_cantidad', 'size'=>20, 'onblur'=>'checkval(2)')); ?></td>
				<td><?php echo $form->textField($items_2,'[1]precio_compra', array('id'=>'items_2_precio','size'=>20, 'onblur'=>'checkval(2)')); ?></td>
				<td><?php echo $form->textField($items_2,'[1]total', array('id'=>'items_2_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_3,'[2]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_3,'[2]cantidad', array('id'=>'items_3_cantidad', 'size'=>20, 'onblur'=>'checkval(3)')); ?></td>
				<td><?php echo $form->textField($items_3,'[2]precio_compra', array('id'=>'items_3_precio','size'=>20, 'onblur'=>'checkval(3)')); ?></td>
				<td><?php echo $form->textField($items_3,'[2]total', array('id'=>'items_3_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_4,'[3]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_4,'[3]cantidad', array('id'=>'items_4_cantidad', 'size'=>20, 'onblur'=>'checkval(4)')); ?></td>
				<td><?php echo $form->textField($items_4,'[3]precio_compra', array('id'=>'items_4_precio','size'=>20, 'onblur'=>'checkval(4)')); ?></td>
				<td><?php echo $form->textField($items_4,'[3]total', array('id'=>'items_4_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_5,'[4]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_5,'[4]cantidad', array('id'=>'items_5_cantidad', 'size'=>20, 'onblur'=>'checkval(5)')); ?></td>
				<td><?php echo $form->textField($items_5,'[4]precio_compra', array('id'=>'items_5_precio','size'=>20, 'onblur'=>'checkval(5)')); ?></td>
				<td><?php echo $form->textField($items_5,'[4]total', array('id'=>'items_5_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_6,'[5]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_6,'[5]cantidad', array('id'=>'items_6_cantidad', 'size'=>20, 'onblur'=>'checkval(6)')); ?></td>
				<td><?php echo $form->textField($items_6,'[5]precio_compra', array('id'=>'items_6_precio','size'=>20, 'onblur'=>'checkval(6)')); ?></td>
				<td><?php echo $form->textField($items_6,'[5]total', array('id'=>'items_6_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_7,'[6]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_7,'[6]cantidad', array('id'=>'items_7_cantidad', 'size'=>20, 'onblur'=>'checkval(7)')); ?></td>
				<td><?php echo $form->textField($items_7,'[6]precio_compra', array('id'=>'items_7_precio','size'=>20, 'onblur'=>'checkval(7)')); ?></td>
				<td><?php echo $form->textField($items_7,'[6]total', array('id'=>'items_7_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_8,'[7]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_8,'[7]cantidad', array('id'=>'items_8_cantidad', 'size'=>20, 'onblur'=>'checkval(8)')); ?></td>
				<td><?php echo $form->textField($items_8,'[7]precio_compra', array('id'=>'items_8_precio','size'=>20, 'onblur'=>'checkval(8)')); ?></td>
				<td><?php echo $form->textField($items_8,'[7]total', array('id'=>'items_8_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_9,'[8]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_9,'[8]cantidad', array('id'=>'items_9_cantidad', 'size'=>20, 'onblur'=>'checkval(9)')); ?></td>
				<td><?php echo $form->textField($items_9,'[8]precio_compra', array('id'=>'items_9_precio','size'=>20, 'onblur'=>'checkval(9)')); ?></td>
				<td><?php echo $form->textField($items_9,'[8]total', array('id'=>'items_9_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_10,'[9]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_10,'[9]cantidad', array('id'=>'items_10_cantidad', 'size'=>20, 'onblur'=>'checkval(10)')); ?></td>
				<td><?php echo $form->textField($items_10,'[9]precio_compra', array('id'=>'items_10_precio','size'=>20, 'onblur'=>'checkval(10)')); ?></td>
				<td><?php echo $form->textField($items_10,'[9]total', array('id'=>'items_10_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_11,'[10]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_11,'[10]cantidad', array('id'=>'items_11_cantidad', 'size'=>20, 'onblur'=>'checkval(11)')); ?></td>
				<td><?php echo $form->textField($items_11,'[10]precio_compra', array('id'=>'items_11_precio','size'=>20, 'onblur'=>'checkval(11)')); ?></td>
				<td><?php echo $form->textField($items_11,'[10]total', array('id'=>'items_11_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_12,'[11]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_12,'[11]cantidad', array('id'=>'items_12_cantidad', 'size'=>20, 'onblur'=>'checkval(12)')); ?></td>
				<td><?php echo $form->textField($items_12,'[11]precio_compra', array('id'=>'items_12_precio','size'=>20, 'onblur'=>'checkval(12)')); ?></td>
				<td><?php echo $form->textField($items_12,'[11]total', array('id'=>'items_12_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_13,'[12]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_13,'[12]cantidad', array('id'=>'items_13_cantidad', 'size'=>20, 'onblur'=>'checkval(13)')); ?></td>
				<td><?php echo $form->textField($items_13,'[12]precio_compra', array('id'=>'items_13_precio','size'=>20, 'onblur'=>'checkval(13)')); ?></td>
				<td><?php echo $form->textField($items_13,'[12]total', array('id'=>'items_13_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_14,'[13]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_14,'[13]cantidad', array('id'=>'items_14_cantidad', 'size'=>20, 'onblur'=>'checkval(14)')); ?></td>
				<td><?php echo $form->textField($items_14,'[13]precio_compra', array('id'=>'items_14_precio','size'=>20, 'onblur'=>'checkval(14)')); ?></td>
				<td><?php echo $form->textField($items_14,'[13]total', array('id'=>'items_14_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_15,'[14]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_15,'[14]cantidad', array('id'=>'items_15_cantidad', 'size'=>20, 'onblur'=>'checkval(15)')); ?></td>
				<td><?php echo $form->textField($items_15,'[14]precio_compra', array('id'=>'items_15_precio','size'=>20, 'onblur'=>'checkval(15)')); ?></td>
				<td><?php echo $form->textField($items_15,'[14]total', array('id'=>'items_15_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_16,'[15]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_16,'[15]cantidad', array('id'=>'items_16_cantidad', 'size'=>20, 'onblur'=>'checkval(16)')); ?></td>
				<td><?php echo $form->textField($items_16,'[15]precio_compra', array('id'=>'items_16_precio','size'=>20, 'onblur'=>'checkval(16)')); ?></td>
				<td><?php echo $form->textField($items_16,'[15]total', array('id'=>'items_16_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_17,'[16]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_17,'[16]cantidad', array('id'=>'items_17_cantidad', 'size'=>20, 'onblur'=>'checkval(17)')); ?></td>
				<td><?php echo $form->textField($items_17,'[16]precio_compra', array('id'=>'items_17_precio','size'=>20, 'onblur'=>'checkval(17)')); ?></td>
				<td><?php echo $form->textField($items_17,'[16]total', array('id'=>'items_17_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_18,'[17]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_18,'[17]cantidad', array('id'=>'items_18_cantidad', 'size'=>20, 'onblur'=>'checkval(18)')); ?></td>
				<td><?php echo $form->textField($items_18,'[17]precio_compra', array('id'=>'items_18_precio','size'=>20, 'onblur'=>'checkval(18)')); ?></td>
				<td><?php echo $form->textField($items_18,'[17]total', array('id'=>'items_18_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_19,'[18]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_19,'[18]cantidad', array('id'=>'items_19_cantidad', 'size'=>20, 'onblur'=>'checkval(19)')); ?></td>
				<td><?php echo $form->textField($items_19,'[18]precio_compra', array('id'=>'items_19_precio','size'=>20, 'onblur'=>'checkval(19)')); ?></td>
				<td><?php echo $form->textField($items_19,'[18]total', array('id'=>'items_19_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_20,'[19]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_20,'[19]cantidad', array('id'=>'items_20_cantidad', 'size'=>20, 'onblur'=>'checkval(20)')); ?></td>
				<td><?php echo $form->textField($items_20,'[19]precio_compra', array('id'=>'items_20_precio','size'=>20, 'onblur'=>'checkval(20)')); ?></td>
				<td><?php echo $form->textField($items_20,'[19]total', array('id'=>'items_20_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_21,'[20]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_21,'[20]cantidad', array('id'=>'items_21_cantidad', 'size'=>20, 'onblur'=>'checkval(21)')); ?></td>
				<td><?php echo $form->textField($items_21,'[20]precio_compra', array('id'=>'items_21_precio','size'=>20, 'onblur'=>'checkval(21)')); ?></td>
				<td><?php echo $form->textField($items_21,'[20]total', array('id'=>'items_21_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_22,'[21]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_22,'[21]cantidad', array('id'=>'items_22_cantidad', 'size'=>20, 'onblur'=>'checkval(22)')); ?></td>
				<td><?php echo $form->textField($items_22,'[21]precio_compra', array('id'=>'items_22_precio','size'=>20, 'onblur'=>'checkval(22)')); ?></td>
				<td><?php echo $form->textField($items_22,'[21]total', array('id'=>'items_22_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_23,'[22]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_23,'[22]cantidad', array('id'=>'items_23_cantidad', 'size'=>20, 'onblur'=>'checkval(23)')); ?></td>
				<td><?php echo $form->textField($items_23,'[22]precio_compra', array('id'=>'items_23_precio','size'=>20, 'onblur'=>'checkval(23)')); ?></td>
				<td><?php echo $form->textField($items_23,'[22]total', array('id'=>'items_23_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_24,'[23]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_24,'[23]cantidad', array('id'=>'items_24_cantidad', 'size'=>20, 'onblur'=>'checkval(24)')); ?></td>
				<td><?php echo $form->textField($items_24,'[23]precio_compra', array('id'=>'items_24_precio','size'=>20, 'onblur'=>'checkval(24)')); ?></td>
				<td><?php echo $form->textField($items_24,'[23]total', array('id'=>'items_24_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_25,'[24]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_25,'[24]cantidad', array('id'=>'items_25_cantidad', 'size'=>20, 'onblur'=>'checkval(25)')); ?></td>
				<td><?php echo $form->textField($items_25,'[24]precio_compra', array('id'=>'items_25_precio','size'=>20, 'onblur'=>'checkval(25)')); ?></td>
				<td><?php echo $form->textField($items_25,'[24]total', array('id'=>'items_25_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_26,'[25]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_26,'[25]cantidad', array('id'=>'items_26_cantidad', 'size'=>20, 'onblur'=>'checkval(26)')); ?></td>
				<td><?php echo $form->textField($items_26,'[25]precio_compra', array('id'=>'items_26_precio','size'=>20, 'onblur'=>'checkval(26)')); ?></td>
				<td><?php echo $form->textField($items_26,'[25]total', array('id'=>'items_26_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_27,'[26]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_27,'[26]cantidad', array('id'=>'items_27_cantidad', 'size'=>20, 'onblur'=>'checkval(27)')); ?></td>
				<td><?php echo $form->textField($items_27,'[26]precio_compra', array('id'=>'items_27_precio','size'=>20, 'onblur'=>'checkval(27)')); ?></td>
				<td><?php echo $form->textField($items_27,'[26]total', array('id'=>'items_27_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_28,'[27]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_28,'[27]cantidad', array('id'=>'items_28_cantidad', 'size'=>20, 'onblur'=>'checkval(28)')); ?></td>
				<td><?php echo $form->textField($items_28,'[27]precio_compra', array('id'=>'items_28_precio','size'=>20, 'onblur'=>'checkval(28)')); ?></td>
				<td><?php echo $form->textField($items_28,'[27]total', array('id'=>'items_28_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_29,'[28]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_29,'[28]cantidad', array('id'=>'items_29_cantidad', 'size'=>20, 'onblur'=>'checkval(29)')); ?></td>
				<td><?php echo $form->textField($items_29,'[28]precio_compra', array('id'=>'items_29_precio','size'=>20, 'onblur'=>'checkval(29)')); ?></td>
				<td><?php echo $form->textField($items_29,'[28]total', array('id'=>'items_29_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->textField($items_30,'[29]id_medicamento', array('size'=>60)); ?></td>
				<td><?php echo $form->textField($items_30,'[29]cantidad', array('id'=>'items_30_cantidad', 'size'=>20, 'onblur'=>'checkval(30)')); ?></td>
				<td><?php echo $form->textField($items_30,'[29]precio_compra', array('id'=>'items_30_precio','size'=>20, 'onblur'=>'checkval(30)')); ?></td>
				<td><?php echo $form->textField($items_30,'[29]total', array('id'=>'items_30_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			
		</table>

		<div class="rowcontact">
			<?php echo $form->labelEx($model,'monto'); ?>
		</div>
		<div class="media">
			<?php echo $form->textField($model,'monto'); ?>
			<?php echo $form->error($model,'monto'); ?>
		</div>
		
		<div class="buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
		</div>

		

		

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">


	function checkval(num) {
		var val1 = document.querySelector('#items_'+num+'_cantidad').value;
		var val2 = document.querySelector('#items_'+num+'_precio').value;

		if(val1!="" && val2!=""){
			var total = val1 * val2;
			$("#items_"+num+"_total").val(total);	
		}
		
	}
	
</script>