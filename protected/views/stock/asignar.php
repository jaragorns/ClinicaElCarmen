<?php
$this->breadcrumbs=array(
	'Asginar Medicamentos',
);

$this->menu=array(
	array('label'=>'Gestionar Inventario', 'url'=>array('admin')),
);

?>

<h1>Asignar Medicamentos</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php if($form->errorSummary(array($model))!=""){ ?>
	<div class="alert alert-info">
    	<strong><?php  echo $form->errorSummary(array($model));?></strong> 
    </div>
	<?php } ?>

	<div class="rowcontact"></div>
	<div class="media">
		<b><?php echo "Estación Origen: ";?></b>
		<?php 
			if(Yii::app()->user->role=="Jefe_Farmacia" OR Yii::app()->user->role=="Farmaceuta"){

				echo '<i>'."FARMACIA ".'</i>'; 
				echo "<b>a</b> ".$form->labelEx($model,'id_estacion')." "; 		 
				echo $form->dropDownList(
					$model,
					'id_estacion',
					CHtml::listData(
						Estaciones::model()->findAll(array('condition'=>'id_estacion NOT IN (:id_estacion,1,7)','params'=>array(':id_estacion'=>6),)),
						'id_estacion',
						'nombre'),
					array(
						'class' => 'my-drop-down',
						'empty'=>'-- Seleccione una Estación --',
					)
				);
				$model->id_estacion = 5;
			}else{ 
				if(!empty(SolicitudesController::verificarGuardia()->id_estacion)){
					echo '<i>'.Estaciones::model()->findByAttributes(array('id_estacion'=>SolicitudesController::verificarGuardia()->id_estacion))->nombre.'</i>';
					echo "<b> a</b> ".$form->labelEx($model,'id_estacion')." "; 		 
					echo $form->dropDownList(
						$model,
						'id_estacion',
						CHtml::listData(
							Estaciones::model()->findAll(array('condition'=>'id_estacion NOT IN (:id_estacion,1,7)','params'=>array(':id_estacion'=>SolicitudesController::verificarGuardia()->id_estacion),)),
							'id_estacion',
							'nombre'),
						array(
							'class' => 'my-drop-down',
							'empty'=>'-- Seleccione una Estación --',
							'title'=>'Seleccione el servicio al que le va a asignar medicamentos.',
						)
					);

					$model->id_estacion = SolicitudesController::verificarGuardia()->id_estacion;
					
				}else{
					Yii::app()->user->setFlash('notice','Debe estar de guardia para realizar asiganaciones.');	
				}
			}
			echo $form->error($model,'id_estacion'); 
		?>
	</div>

		<h3>Detalle</h3>

		<table>
			<tr>
				<th><?php echo $form->labelEx($items_1,'[0]id_medicamento'); ?></th>
				<th><?php echo Chtml::label('Existencia *', 'Existencia', array()); ?></th>
				<th><?php echo Chtml::label('Asignación *', 'Asignacion', array()); ?></th>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_1,'[0]id_medicamento',array());

						if(!empty($items_1->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_1->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_1->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_1',
		    				'value'=>$medicamento,
		    				'model'=>$items_1,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_0_id_medicamento').val(ui.item.id_medicamento);
       								$('#Stock_0_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'placeholder'=>'Nombre del medicamento...',
        						'title'=>'Indique el medicamento que desea asignar.',
        					),
						));

					?>
				</td>
				<td><?php echo Chtml::textField('[0]existencia', $existencia, array('id'=>'Stock_0_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_1,'[0]cantidad', array('id'=>'Stock_1_cantidad','size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(0)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_2,'[1]id_medicamento',array());

						if(!empty($items_2->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_2->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_2->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_2',
		    				'value'=>$medicamento,
		    				'model'=>$items_2,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_1_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_1_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[1]existencia', $existencia, array('id'=>'Stock_1_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_2,'[1]cantidad', array('id'=>'Stock_2_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(1)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_3,'[2]id_medicamento',array());

						if(!empty($items_3->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_3->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_3->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_3',
		    				'value'=>$medicamento,
		    				'model'=>$items_3,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_2_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_2_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[2]existencia', $existencia, array('id'=>'Stock_2_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_3,'[2]cantidad', array('id'=>'Stock_3_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(2)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_4,'[3]id_medicamento',array());

						if(!empty($items_4->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_4->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_4->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_4',
		    				'value'=>$medicamento,
		    				'model'=>$items_4,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_3_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_3_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[3]existencia', $existencia, array('id'=>'Stock_3_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_4,'[3]cantidad', array('id'=>'Stock_4_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(3)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_5,'[4]id_medicamento',array());

						if(!empty($items_5->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_5->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_5->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_5',
		    				'value'=>$medicamento,
		    				'model'=>$items_5,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_4_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_4_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[4]existencia', $existencia, array('id'=>'Stock_4_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_5,'[4]cantidad', array('id'=>'Stock_5_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(4)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_6,'[5]id_medicamento',array());

						if(!empty($items_6->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_6->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_6->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_6',
		    				'value'=>$medicamento,
		    				'model'=>$items_6,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_5_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_5_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[5]existencia', $existencia, array('id'=>'Stock_5_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_6,'[5]cantidad', array('id'=>'Stock_6_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(5)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_7,'[6]id_medicamento',array());

						if(!empty($items_7->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_7->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_7->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_7',
		    				'value'=>$medicamento,
		    				'model'=>$items_7,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_6_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_6_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[6]existencia', $existencia, array('id'=>'Stock_6_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_7,'[6]cantidad', array('id'=>'Stock_7_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(6)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_8,'[7]id_medicamento',array());

						if(!empty($items_8->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_8->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_8->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_8',
		    				'value'=>$medicamento,
		    				'model'=>$items_8,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_7_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_7_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[7]existencia', $existencia, array('id'=>'Stock_7_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_8,'[7]cantidad', array('id'=>'Stock_8_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(7)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_9,'[8]id_medicamento',array());

						if(!empty($items_9->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_9->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_9->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_9',
		    				'value'=>$medicamento,
		    				'model'=>$items_9,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_8_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_8_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[8]existencia', $existencia, array('id'=>'Stock_8_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_9,'[8]cantidad', array('id'=>'Stock_9_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(8)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_10,'[9]id_medicamento',array());

						if(!empty($items_10->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_10->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_10->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_10',
		    				'value'=>$medicamento,
		    				'model'=>$items_10,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_9_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_9_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[9]existencia', $existencia, array('id'=>'Stock_9_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_10,'[9]cantidad', array('id'=>'Stock_10_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(9)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_11,'[10]id_medicamento',array());

						if(!empty($items_11->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_11->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_11->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_11',
		    				'value'=>$medicamento,
		    				'model'=>$items_11,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_10_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_10_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[10]existencia', $existencia, array('id'=>'Stock_10_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_11,'[10]cantidad', array('id'=>'Stock_11_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(10)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_12,'[11]id_medicamento',array());

						if(!empty($items_12->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_12->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_12->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_12',
		    				'value'=>$medicamento,
		    				'model'=>$items_12,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_11_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_11_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[11]existencia', $existencia, array('id'=>'Stock_11_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_12,'[11]cantidad', array('id'=>'Stock_12_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(11)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_13,'[12]id_medicamento',array());

						if(!empty($items_13->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_13->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_13->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_13',
		    				'value'=>$medicamento,
		    				'model'=>$items_13,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_12_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_12_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[12]existencia', $existencia, array('id'=>'Stock_12_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_13,'[12]cantidad', array('id'=>'Stock_13_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(12)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_14,'[13]id_medicamento',array());

						if(!empty($items_14->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_14->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_14->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_14',
		    				'value'=>$medicamento,
		    				'model'=>$items_14,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_13_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_13_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[13]existencia', $existencia, array('id'=>'Stock_13_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_14,'[13]cantidad', array('id'=>'Stock_14_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(13)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_15,'[14]id_medicamento',array());

						if(!empty($items_15->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_15->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_15->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_15',
		    				'value'=>$medicamento,
		    				'model'=>$items_15,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_14_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_14_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[14]existencia', $existencia, array('id'=>'Stock_14_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_15,'[14]cantidad', array('id'=>'Stock_15_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(14)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_16,'[15]id_medicamento',array());

						if(!empty($items_16->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_16->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_16->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_16',
		    				'value'=>$medicamento,
		    				'model'=>$items_16,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_15_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_15_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[15]existencia', $existencia, array('id'=>'Stock_15_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_16,'[15]cantidad', array('id'=>'Stock_16_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(15)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_17,'[16]id_medicamento',array());

						if(!empty($items_17->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_17->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_17->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_17',
		    				'value'=>$medicamento,
		    				'model'=>$items_17,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_16_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_16_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[16]existencia', $existencia, array('id'=>'Stock_16_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_17,'[16]cantidad', array('id'=>'Stock_17_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(16)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_18,'[17]id_medicamento',array());

						if(!empty($items_18->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_18->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_18->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_18',
		    				'value'=>$medicamento,
		    				'model'=>$items_18,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_17_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_17_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[17]existencia', $existencia, array('id'=>'Stock_17_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_18,'[17]cantidad', array('id'=>'Stock_18_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(17)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_19,'[18]id_medicamento',array());

						if(!empty($items_19->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_19->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_19->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_19',
		    				'value'=>$medicamento,
		    				'model'=>$items_19,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_18_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_18_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[18]existencia', $existencia, array('id'=>'Stock_18_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_19,'[18]cantidad', array('id'=>'Stock_19_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(18)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_20,'[19]id_medicamento',array());

						if(!empty($items_20->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_20->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_20->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_20',
		    				'value'=>$medicamento,
		    				'model'=>$items_20,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_19_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_19_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[19]existencia', $existencia, array('id'=>'Stock_19_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_20,'[19]cantidad', array('id'=>'Stock_20_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(19)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_21,'[20]id_medicamento',array());

						if(!empty($items_21->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_21->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_21->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_21',
		    				'value'=>$medicamento,
		    				'model'=>$items_21,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_20_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_20_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[20]existencia', $existencia, array('id'=>'Stock_20_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_21,'[20]cantidad', array('id'=>'Stock_21_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(20)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_22,'[21]id_medicamento',array());

						if(!empty($items_22->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_22->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_22->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_22',
		    				'value'=>$medicamento,
		    				'model'=>$items_22,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_21_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_21_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[21]existencia', $existencia, array('id'=>'Stock_21_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_22,'[21]cantidad', array('id'=>'Stock_22_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(21)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_23,'[22]id_medicamento',array());

						if(!empty($items_23->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_23->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_23->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_23',
		    				'value'=>$medicamento,
		    				'model'=>$items_23,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_22_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_22_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[22]existencia', $existencia, array('id'=>'Stock_22_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_23,'[22]cantidad', array('id'=>'Stock_23_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(22)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_24,'[23]id_medicamento',array());

						if(!empty($items_24->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_24->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_24->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_24',
		    				'value'=>$medicamento,
		    				'model'=>$items_24,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_23_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_23_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[23]existencia', $existencia, array('id'=>'Stock_23_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_24,'[23]cantidad', array('id'=>'Stock_24_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(23)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_25,'[24]id_medicamento',array());

						if(!empty($items_25->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_25->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_25->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_25',
		    				'value'=>$medicamento,
		    				'model'=>$items_25,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_24_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_24_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[24]existencia', $existencia, array('id'=>'Stock_24_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_25,'[24]cantidad', array('id'=>'Stock_25_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(24)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_26,'[25]id_medicamento',array());

						if(!empty($items_26->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_26->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_26->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_26',
		    				'value'=>$medicamento,
		    				'model'=>$items_26,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_25_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_25_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[25]existencia', $existencia, array('id'=>'Stock_25_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_26,'[25]cantidad', array('id'=>'Stock_26_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(25)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_27,'[26]id_medicamento',array());

						if(!empty($items_27->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_27->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_27->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_27',
		    				'value'=>$medicamento,
		    				'model'=>$items_27,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_26_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_26_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[26]existencia', $existencia, array('id'=>'Stock_26_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_27,'[26]cantidad', array('id'=>'Stock_27_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(26)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_28,'[27]id_medicamento',array());

						if(!empty($items_28->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_28->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_28->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_28',
		    				'value'=>$medicamento,
		    				'model'=>$items_28,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_27_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_27_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[27]existencia', $existencia, array('id'=>'Stock_27_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_28,'[27]cantidad', array('id'=>'Stock_28_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(27)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_29,'[28]id_medicamento',array());

						if(!empty($items_29->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_29->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_29->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_29',
		    				'value'=>$medicamento,
		    				'model'=>$items_29,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_28_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_28_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[28]existencia', $existencia, array('id'=>'Stock_28_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_29,'[28]cantidad', array('id'=>'Stock_29_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(28)')); ?></td>
			</tr>
			<tr>
				<td>
					<?php 
						echo $form->hiddenField($items_30,'[29]id_medicamento',array());

						if(!empty($items_30->id_medicamento)){
							$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_30->id_medicamento))->nombre;
							$existencia = Stock::model()->find(array('condition'=>'id_medicamento = '.$items_30->id_medicamento.' AND id_estacion ='.$model->id_estacion,))->cantidad;
						}else{
							$medicamento = "";
							$existencia = "";
						}

						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    				'name'=>'nombre_30',
		    				'value'=>$medicamento,
		    				'model'=>$items_30,
		    				'source'=>$this->createUrl('Stock/Autocomplete'),
		    				// additional javascript options for the autocomplete plugin
		    				'options'=>array(
		    					'minLength'=>'1',
		            			'showAnim'=>'fold',
		            			'select'=>"js:function(event, ui) { 
       								$('#Stock_29_id_medicamento').val(ui.item.id_medicamento); 
       								$('#Stock_29_existencia').val(ui.item.existencia); 
       							}"
		    				),
		    				'htmlOptions'=>array(
        						'style'=>'width:436px;',
        						'title'=>'Indique el medicamento que desea asignar.'
    						),
						));
					?>
				</td>
				<td><?php echo Chtml::textField('[29]existencia', $existencia, array('id'=>'Stock_29_existencia','size'=>10, 'title'=>'Si la existencia no es la correcta, DEBE CORREGIR EN EL MEDICAMENTO','readonly'=>'disable')); ?></td>
				<td><?php echo $form->textField($items_30,'[29]cantidad', array('id'=>'Stock_30_cantidad', 'size'=>20, 'title'=>'Cantidad que va a asignar del medicamento seleccionado.', 'onblur'=>'checkval(29)')); ?></td>
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
		var existencia = document.querySelector('#Stock_'+num+'_existencia').value.replace(',','.');
		var asignar = document.querySelector('#Stock_'+(num+1)+'_cantidad').value.replace(',','.');

		if (isNaN(existencia) || isNaN(asignar)) {
			alert("Debe Ingresar un valor numérico");
			$("#Stock_"+(num+1)+"_cantidad").val('');	
		}else{
			if(existencia!="" && asignar!=""){
				if(Number(asignar) > Number(existencia)){
					alert("La cantidad ASIGNADA es MAYOR a la EXISTENCIA. Por Favor revisar.");
					$("#Stock_"+(num+1)+"_cantidad").val('');	
				}
			}
		}
	}

</script>
