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
    	<strong><?php  echo $form->errorSummary(array($model, $items_1, $items_2, $items_3, $items_4, 
    			$items_5, $items_6, $items_7, $items_8, $items_9, $items_10, $items_11, $items_12, $items_13,
    			$items_14, $items_15, $items_16, $items_17, $items_18, $items_19, $items_20, $items_21, $items_22,
    			$items_23, $items_24, $items_25, $items_26, $items_27, $items_28, $items_29, $items_30));?></strong> 
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
			                    'changeMonth' => 'true', 
    							'changeYear' => 'true',
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
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_2,'[1]id_medicamento',array());

						if(!empty($items_2->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_2->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_2->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_2',
		    				'value'=>$medicamento,
		    				'model'=>$items_2,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_1_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_1_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[1]iva', $iva, array('id'=>'Inventario_1_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_2,'[1]cantidad', array('id'=>'items_2_cantidad', 'size'=>20, 'onblur'=>'checkval(2)')); ?></td>
				<td><?php echo $form->textField($items_2,'[1]precio_compra', array('id'=>'items_2_precio','size'=>20, 'onblur'=>'checkval(2)')); ?></td>
				<td><?php echo $form->textField($items_2,'[1]total', array('id'=>'items_2_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_3,'[2]id_medicamento',array());

						if(!empty($items_3->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_3->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_3->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_3',
		    				'value'=>$medicamento,
		    				'model'=>$items_3,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_2_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_2_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[2]iva', $iva, array('id'=>'Inventario_2_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_3,'[2]cantidad', array('id'=>'items_3_cantidad', 'size'=>20, 'onblur'=>'checkval(3)')); ?></td>
				<td><?php echo $form->textField($items_3,'[2]precio_compra', array('id'=>'items_3_precio','size'=>20, 'onblur'=>'checkval(3)')); ?></td>
				<td><?php echo $form->textField($items_3,'[2]total', array('id'=>'items_3_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_4,'[3]id_medicamento',array());

						if(!empty($items_4->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_4->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_4->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_4',
		    				'value'=>$medicamento,
		    				'model'=>$items_4,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_3_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_3_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[3]iva', $iva, array('id'=>'Inventario_3_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_4,'[3]cantidad', array('id'=>'items_4_cantidad', 'size'=>20, 'onblur'=>'checkval(4)')); ?></td>
				<td><?php echo $form->textField($items_4,'[3]precio_compra', array('id'=>'items_4_precio','size'=>20, 'onblur'=>'checkval(4)')); ?></td>
				<td><?php echo $form->textField($items_4,'[3]total', array('id'=>'items_4_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_5,'[4]id_medicamento',array());

						if(!empty($items_5->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_5->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_5->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_5',
		    				'value'=>$medicamento,
		    				'model'=>$items_5,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_4_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_4_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[4]iva', $iva, array('id'=>'Inventario_4_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_5,'[4]cantidad', array('id'=>'items_5_cantidad', 'size'=>20, 'onblur'=>'checkval(5)')); ?></td>
				<td><?php echo $form->textField($items_5,'[4]precio_compra', array('id'=>'items_5_precio','size'=>20, 'onblur'=>'checkval(5)')); ?></td>
				<td><?php echo $form->textField($items_5,'[4]total', array('id'=>'items_5_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_6,'[5]id_medicamento',array());

						if(!empty($items_6->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_6->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_6->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_6',
		    				'value'=>$medicamento,
		    				'model'=>$items_6,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_5_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_5_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[5]iva', $iva, array('id'=>'Inventario_5_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_6,'[5]cantidad', array('id'=>'items_6_cantidad', 'size'=>20, 'onblur'=>'checkval(6)')); ?></td>
				<td><?php echo $form->textField($items_6,'[5]precio_compra', array('id'=>'items_6_precio','size'=>20, 'onblur'=>'checkval(6)')); ?></td>
				<td><?php echo $form->textField($items_6,'[5]total', array('id'=>'items_6_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_7,'[6]id_medicamento',array());

						if(!empty($items_7->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_7->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_7->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_7',
		    				'value'=>$medicamento,
		    				'model'=>$items_7,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_6_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_6_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[6]iva', $iva, array('id'=>'Inventario_6_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_7,'[6]cantidad', array('id'=>'items_7_cantidad', 'size'=>20, 'onblur'=>'checkval(7)')); ?></td>
				<td><?php echo $form->textField($items_7,'[6]precio_compra', array('id'=>'items_7_precio','size'=>20, 'onblur'=>'checkval(7)')); ?></td>
				<td><?php echo $form->textField($items_7,'[6]total', array('id'=>'items_7_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_8,'[7]id_medicamento',array());

						if(!empty($items_8->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_8->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_8->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_8',
		    				'value'=>$medicamento,
		    				'model'=>$items_8,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_7_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_7_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[7]iva', $iva, array('id'=>'Inventario_7_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_8,'[7]cantidad', array('id'=>'items_8_cantidad', 'size'=>20, 'onblur'=>'checkval(8)')); ?></td>
				<td><?php echo $form->textField($items_8,'[7]precio_compra', array('id'=>'items_8_precio','size'=>20, 'onblur'=>'checkval(8)')); ?></td>
				<td><?php echo $form->textField($items_8,'[7]total', array('id'=>'items_8_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_9,'[8]id_medicamento',array());

						if(!empty($items_9->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_9->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_9->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_9',
		    				'value'=>$medicamento,
		    				'model'=>$items_9,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_8_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_8_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[8]iva', $iva, array('id'=>'Inventario_8_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_9,'[8]cantidad', array('id'=>'items_9_cantidad', 'size'=>20, 'onblur'=>'checkval(9)')); ?></td>
				<td><?php echo $form->textField($items_9,'[8]precio_compra', array('id'=>'items_9_precio','size'=>20, 'onblur'=>'checkval(9)')); ?></td>
				<td><?php echo $form->textField($items_9,'[8]total', array('id'=>'items_9_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_10,'[9]id_medicamento',array());

						if(!empty($items_10->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_10->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_10->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_10',
		    				'value'=>$medicamento,
		    				'model'=>$items_10,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_9_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_9_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[9]iva', $iva, array('id'=>'Inventario_9_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_10,'[9]cantidad', array('id'=>'items_10_cantidad', 'size'=>20, 'onblur'=>'checkval(10)')); ?></td>
				<td><?php echo $form->textField($items_10,'[9]precio_compra', array('id'=>'items_10_precio','size'=>20, 'onblur'=>'checkval(10)')); ?></td>
				<td><?php echo $form->textField($items_10,'[9]total', array('id'=>'items_10_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_11,'[10]id_medicamento',array());

						if(!empty($items_11->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_11->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_11->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_11',
		    				'value'=>$medicamento,
		    				'model'=>$items_11,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_10_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_10_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[10]iva', $iva, array('id'=>'Inventario_10_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_11,'[10]cantidad', array('id'=>'items_11_cantidad', 'size'=>20, 'onblur'=>'checkval(11)')); ?></td>
				<td><?php echo $form->textField($items_11,'[10]precio_compra', array('id'=>'items_11_precio','size'=>20, 'onblur'=>'checkval(11)')); ?></td>
				<td><?php echo $form->textField($items_11,'[10]total', array('id'=>'items_11_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_12,'[11]id_medicamento',array());

						if(!empty($items_12->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_12->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_12->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_12',
		    				'value'=>$medicamento,
		    				'model'=>$items_12,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_11_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_11_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[11]iva', $iva, array('id'=>'Inventario_11_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_12,'[11]cantidad', array('id'=>'items_12_cantidad', 'size'=>20, 'onblur'=>'checkval(12)')); ?></td>
				<td><?php echo $form->textField($items_12,'[11]precio_compra', array('id'=>'items_12_precio','size'=>20, 'onblur'=>'checkval(12)')); ?></td>
				<td><?php echo $form->textField($items_12,'[11]total', array('id'=>'items_12_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_13,'[12]id_medicamento',array());

						if(!empty($items_13->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_13->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_13->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_13',
		    				'value'=>$medicamento,
		    				'model'=>$items_13,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_12_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_12_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[12]iva', $iva, array('id'=>'Inventario_12_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_13,'[12]cantidad', array('id'=>'items_13_cantidad', 'size'=>20, 'onblur'=>'checkval(13)')); ?></td>
				<td><?php echo $form->textField($items_13,'[12]precio_compra', array('id'=>'items_13_precio','size'=>20, 'onblur'=>'checkval(13)')); ?></td>
				<td><?php echo $form->textField($items_13,'[12]total', array('id'=>'items_13_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_14,'[13]id_medicamento',array());

						if(!empty($items_14->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_14->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_14->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_14',
		    				'value'=>$medicamento,
		    				'model'=>$items_14,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_13_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_13_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[13]iva', $iva, array('id'=>'Inventario_13_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_14,'[13]cantidad', array('id'=>'items_14_cantidad', 'size'=>20, 'onblur'=>'checkval(14)')); ?></td>
				<td><?php echo $form->textField($items_14,'[13]precio_compra', array('id'=>'items_14_precio','size'=>20, 'onblur'=>'checkval(14)')); ?></td>
				<td><?php echo $form->textField($items_14,'[13]total', array('id'=>'items_14_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_15,'[14]id_medicamento',array());

						if(!empty($items_15->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_15->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_15->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_15',
		    				'value'=>$medicamento,
		    				'model'=>$items_15,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_14_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_14_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[14]iva', $iva, array('id'=>'Inventario_14_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_15,'[14]cantidad', array('id'=>'items_15_cantidad', 'size'=>20, 'onblur'=>'checkval(15)')); ?></td>
				<td><?php echo $form->textField($items_15,'[14]precio_compra', array('id'=>'items_15_precio','size'=>20, 'onblur'=>'checkval(15)')); ?></td>
				<td><?php echo $form->textField($items_15,'[14]total', array('id'=>'items_15_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_16,'[15]id_medicamento',array());

						if(!empty($items_16->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_16->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_16->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_16',
		    				'value'=>$medicamento,
		    				'model'=>$items_16,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_15_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_15_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[15]iva', $iva, array('id'=>'Inventario_15_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_16,'[15]cantidad', array('id'=>'items_16_cantidad', 'size'=>20, 'onblur'=>'checkval(16)')); ?></td>
				<td><?php echo $form->textField($items_16,'[15]precio_compra', array('id'=>'items_16_precio','size'=>20, 'onblur'=>'checkval(16)')); ?></td>
				<td><?php echo $form->textField($items_16,'[15]total', array('id'=>'items_16_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_17,'[16]id_medicamento',array());

						if(!empty($items_17->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_17->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_17->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_17',
		    				'value'=>$medicamento,
		    				'model'=>$items_17,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_16_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_16_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[16]iva', $iva, array('id'=>'Inventario_16_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_17,'[16]cantidad', array('id'=>'items_17_cantidad', 'size'=>20, 'onblur'=>'checkval(17)')); ?></td>
				<td><?php echo $form->textField($items_17,'[16]precio_compra', array('id'=>'items_17_precio','size'=>20, 'onblur'=>'checkval(17)')); ?></td>
				<td><?php echo $form->textField($items_17,'[16]total', array('id'=>'items_17_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_18,'[17]id_medicamento',array());

						if(!empty($items_18->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_18->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_18->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_18',
		    				'value'=>$medicamento,
		    				'model'=>$items_18,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_17_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_17_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[17]iva', $iva, array('id'=>'Inventario_17_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_18,'[17]cantidad', array('id'=>'items_18_cantidad', 'size'=>20, 'onblur'=>'checkval(18)')); ?></td>
				<td><?php echo $form->textField($items_18,'[17]precio_compra', array('id'=>'items_18_precio','size'=>20, 'onblur'=>'checkval(18)')); ?></td>
				<td><?php echo $form->textField($items_18,'[17]total', array('id'=>'items_18_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_19,'[18]id_medicamento',array());

						if(!empty($items_19->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_19->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_19->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_19',
		    				'value'=>$medicamento,
		    				'model'=>$items_19,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_18_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_18_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[18]iva', $iva, array('id'=>'Inventario_18_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_19,'[18]cantidad', array('id'=>'items_19_cantidad', 'size'=>20, 'onblur'=>'checkval(19)')); ?></td>
				<td><?php echo $form->textField($items_19,'[18]precio_compra', array('id'=>'items_19_precio','size'=>20, 'onblur'=>'checkval(19)')); ?></td>
				<td><?php echo $form->textField($items_19,'[18]total', array('id'=>'items_19_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_20,'[19]id_medicamento',array());

						if(!empty($items_20->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_20->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_20->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_20',
		    				'value'=>$medicamento,
		    				'model'=>$items_20,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_19_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_19_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[19]iva', $iva, array('id'=>'Inventario_19_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_20,'[19]cantidad', array('id'=>'items_20_cantidad', 'size'=>20, 'onblur'=>'checkval(20)')); ?></td>
				<td><?php echo $form->textField($items_20,'[19]precio_compra', array('id'=>'items_20_precio','size'=>20, 'onblur'=>'checkval(20)')); ?></td>
				<td><?php echo $form->textField($items_20,'[19]total', array('id'=>'items_20_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_21,'[20]id_medicamento',array());

						if(!empty($items_21->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_21->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_21->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_21',
		    				'value'=>$medicamento,
		    				'model'=>$items_21,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_20_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_20_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[20]iva', $iva, array('id'=>'Inventario_20_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_21,'[20]cantidad', array('id'=>'items_21_cantidad', 'size'=>20, 'onblur'=>'checkval(21)')); ?></td>
				<td><?php echo $form->textField($items_21,'[20]precio_compra', array('id'=>'items_21_precio','size'=>20, 'onblur'=>'checkval(21)')); ?></td>
				<td><?php echo $form->textField($items_21,'[20]total', array('id'=>'items_21_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_22,'[21]id_medicamento',array());

						if(!empty($items_22->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_22->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_22->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_22',
		    				'value'=>$medicamento,
		    				'model'=>$items_22,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_21_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_21_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[21]iva', $iva, array('id'=>'Inventario_21_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_22,'[21]cantidad', array('id'=>'items_22_cantidad', 'size'=>20, 'onblur'=>'checkval(22)')); ?></td>
				<td><?php echo $form->textField($items_22,'[21]precio_compra', array('id'=>'items_22_precio','size'=>20, 'onblur'=>'checkval(22)')); ?></td>
				<td><?php echo $form->textField($items_22,'[21]total', array('id'=>'items_22_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_23,'[22]id_medicamento',array());

						if(!empty($items_23->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_23->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_23->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_23',
		    				'value'=>$medicamento,
		    				'model'=>$items_23,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_22_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_22_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[22]iva', $iva, array('id'=>'Inventario_22_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_23,'[22]cantidad', array('id'=>'items_23_cantidad', 'size'=>20, 'onblur'=>'checkval(23)')); ?></td>
				<td><?php echo $form->textField($items_23,'[22]precio_compra', array('id'=>'items_23_precio','size'=>20, 'onblur'=>'checkval(23)')); ?></td>
				<td><?php echo $form->textField($items_23,'[22]total', array('id'=>'items_23_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_24,'[23]id_medicamento',array());

						if(!empty($items_24->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_24->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_24->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_24',
		    				'value'=>$medicamento,
		    				'model'=>$items_24,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_23_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_23_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[23]iva', $iva, array('id'=>'Inventario_23_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_24,'[23]cantidad', array('id'=>'items_24_cantidad', 'size'=>20, 'onblur'=>'checkval(24)')); ?></td>
				<td><?php echo $form->textField($items_24,'[23]precio_compra', array('id'=>'items_24_precio','size'=>20, 'onblur'=>'checkval(24)')); ?></td>
				<td><?php echo $form->textField($items_24,'[23]total', array('id'=>'items_24_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_25,'[24]id_medicamento',array());

						if(!empty($items_25->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_25->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items25->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_25',
		    				'value'=>$medicamento,
		    				'model'=>$items_25,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_24_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_24_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[24]iva', $iva, array('id'=>'Inventario_24_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_25,'[24]cantidad', array('id'=>'items_25_cantidad', 'size'=>20, 'onblur'=>'checkval(25)')); ?></td>
				<td><?php echo $form->textField($items_25,'[24]precio_compra', array('id'=>'items_25_precio','size'=>20, 'onblur'=>'checkval(25)')); ?></td>
				<td><?php echo $form->textField($items_25,'[24]total', array('id'=>'items_25_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_26,'[25]id_medicamento',array());

						if(!empty($items_26->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_26->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_26->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_26',
		    				'value'=>$medicamento,
		    				'model'=>$items_26,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_25_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_25_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[25]iva', $iva, array('id'=>'Inventario_25_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_26,'[25]cantidad', array('id'=>'items_26_cantidad', 'size'=>20, 'onblur'=>'checkval(26)')); ?></td>
				<td><?php echo $form->textField($items_26,'[25]precio_compra', array('id'=>'items_26_precio','size'=>20, 'onblur'=>'checkval(26)')); ?></td>
				<td><?php echo $form->textField($items_26,'[25]total', array('id'=>'items_26_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_27,'[26]id_medicamento',array());

						if(!empty($items_27->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_27->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_27->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_27',
		    				'value'=>$medicamento,
		    				'model'=>$items_27,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_26_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_26_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[26]iva', $iva, array('id'=>'Inventario_26_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_27,'[26]cantidad', array('id'=>'items_27_cantidad', 'size'=>20, 'onblur'=>'checkval(27)')); ?></td>
				<td><?php echo $form->textField($items_27,'[26]precio_compra', array('id'=>'items_27_precio','size'=>20, 'onblur'=>'checkval(27)')); ?></td>
				<td><?php echo $form->textField($items_27,'[26]total', array('id'=>'items_27_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_28,'[27]id_medicamento',array());

						if(!empty($items_28->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_28->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_28->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_28',
		    				'value'=>$medicamento,
		    				'model'=>$items_28,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_27_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_27_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[27]iva', $iva, array('id'=>'Inventario_27_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_28,'[27]cantidad', array('id'=>'items_28_cantidad', 'size'=>20, 'onblur'=>'checkval(28)')); ?></td>
				<td><?php echo $form->textField($items_28,'[27]precio_compra', array('id'=>'items_28_precio','size'=>20, 'onblur'=>'checkval(28)')); ?></td>
				<td><?php echo $form->textField($items_28,'[27]total', array('id'=>'items_28_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_29,'[28]id_medicamento',array());

						if(!empty($items_29->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_29->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_29->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_29',
		    				'value'=>$medicamento,
		    				'model'=>$items_29,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_28_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_28_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[28]iva', $iva, array('id'=>'Inventario_28_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_29,'[28]cantidad', array('id'=>'items_29_cantidad', 'size'=>20, 'onblur'=>'checkval(29)')); ?></td>
				<td><?php echo $form->textField($items_29,'[28]precio_compra', array('id'=>'items_29_precio','size'=>20, 'onblur'=>'checkval(29)')); ?></td>
				<td><?php echo $form->textField($items_29,'[28]total', array('id'=>'items_29_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_30,'[29]id_medicamento',array());

						if(!empty($items_30->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_30->id_medicamento))->nombre;
							$iva = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_30->id_medicamento))->iva;
						}else{
							$medicamento = "";
							$iva = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_30',
		    				'value'=>$medicamento,
		    				'model'=>$items_30,
		    				'source'=>$this->createUrl('Facturas/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Inventario_29_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Inventario_29_iva').val(ui.item.iva);
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea agregar a la factura.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[29]iva', $iva, array('id'=>'Inventario_29_iva','size'=>5, 'title'=>'Si el IVA no es el correcto, DEBE CORREGIRLO EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_30,'[29]cantidad', array('id'=>'items_30_cantidad', 'size'=>20, 'onblur'=>'checkval(30)')); ?></td>
				<td><?php echo $form->textField($items_30,'[29]precio_compra', array('id'=>'items_30_precio','size'=>20, 'onblur'=>'checkval(30)')); ?></td>
				<td><?php echo $form->textField($items_30,'[29]total', array('id'=>'items_30_total','size'=>30, 'readonly'=>'disable')); ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td align="right"><?php echo $form->labelEx($model,'monto'); ?></td>
				<td><?php echo $form->textField($model,'monto', array('id'=>'items_30_total','size'=>30, 'readonly'=>'disable')); ?></td>				
			</tr>
		</table>
		<table>
			<tr>
				<td><?php echo $form->labelEx($model,'retencion'); ?></td>
				<td><?php echo $form->radioButtonList($model,'retencion',array('1'=>'75 %','2'=>'100 %','3'=>'Sin Retención'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'<br> ',)); ?></td>
			</tr>
		</table>

		<br><br>
		<div class="buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
		</div>

		

		

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

	function checkval(num) {
		var val1 = document.querySelector('#items_'+num+'_cantidad').value.replace(',','.');
		var val2 = document.querySelector('#items_'+num+'_precio').value.replace(',','.');
		var porcentajeIva = document.getElementById('Inventario_'+(num-1)+'_iva').value.replace(',','.'); 

		if (isNaN(val1) || isNaN(val2)) {
			alert("Debe Ingresar un valor numérico");
		}else{
			if(val1!="" && val2!=""){
				if(porcentajeIva>0){
					var iva = (val1 * val2) * (porcentajeIva/100);
					var total = (val1 * val2) + iva;
					total = (Math.round(total * 10) / 10).toFixed(2);

				}else{
					var total = (val1 * val2);
				}
				
				$("#items_"+num+"_total").val(total);	
			}else{
				$("#items_"+num+"_total").val('');	
			}
		}		
	}

	
</script>