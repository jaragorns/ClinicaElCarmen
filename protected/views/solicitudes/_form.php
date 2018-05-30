<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solicitudes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php if($form->errorSummary($model)!=""){ ?>
	<div class="alert alert-info">
    	<strong><?php echo $form->errorSummary(array($model,$items_0));?></strong> 
    </div>
	<?php } ?>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'estacion_id_estacion'); ?>
	</div>
	<div class="media">
		<?php 
			$servicio = $this->verificarGuardia(); 
			$servicio = $servicio['id_estacion'];

			$sql2 = 'SELECT * FROM Estaciones WHERE id_estacion NOT IN ("1","7","'.$servicio.'")  '; 
			echo $form->dropDownList($model,'estacion_id_estacion',
			CHtml::listData(
				Estaciones::model()->findAllBySql($sql2),'id_estacion','nombre'),	array('class' => 'my-drop-down','prompt'=>'Seleccionar:',)); ?> 
		<?php echo $form->error($model,'estacion_id_estacion'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'usuarios'); ?>
	</div>
	<div class="media">
		<?php 
			$deGuardia = $this->verificarGuardia();
			$sql = "SELECT * FROM usuarios WHERE id=".$deGuardia->id_usuario; 
			$responsable = Usuarios::model()->findBySql($sql);
			echo $responsable->NombreCompleto. " - ";
			echo $form->hiddenField($model,'usuarios',array("value"=>$deGuardia->id_usuario));				
			$sql="SELECT nombre FROM estaciones WHERE id_estacion=".$deGuardia->id_estacion; 
			$nomEstacion = Estaciones::model()->findBySql($sql);
			?><b><?php echo "(".$nomEstacion->nombre.")";  ?></b> 
			<?php 			
		?>
	</div>

	<div class="media">
		<?php echo $form->hiddenField($model,'guardias_id_guardia',array("value"=>$deGuardia->id_guardia)); ?>
	</div>

	<div class="rowcontact">
		<table>
		<tr>
			<th><?php echo $form->labelEx($items_0,'[0]id_stock'); ?></th>
			<th><?php echo $form->labelEx($items_0,'[0]cantidad'); ?></th>
		</tr>
		<tr>
			<td>
				<?php 
				//echo $form->hiddenField($items_0,'[0]id_stock',array());
				echo $form->hiddenField($items_0,'[0]id_medicamento',array());

				if(!empty($items_0->id_medicamento)){
					$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_0->id_medicamento))->nombre;
				}else{
					$medicamento = "";
				}

				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'nombre_0',
					'value'=>$medicamento,
					'model'=>$items_0,
					'source'=>$this->createUrl('ItemSolicitud/Autocomplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
						'minLength'=>'1',
	        			'showAnim'=>'fold',
	        			'select'=>"js:function(event, ui) { 
								$('#ItemSolicitud_0_id_stock').val(ui.item.id_stock); 
								$('#ItemSolicitud_0_id_medicamento').val(ui.item.id_medicamento); 
							}"
					),
					'htmlOptions'=>array(
						'style'=>'width:350px;',
						'placeholder'=>'Nombre del medicamento...',
						'title'=>'Indique el medicamento que desea solicitar.'
					),
				));
				?>
			</td>
			<td>
				<?php echo $form->textField($items_0,'[0]cantidad',array('size'=>10,'maxlength'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				//echo $form->hiddenField($items_1,'[1]id_stock',array());
				echo $form->hiddenField($items_1,'[1]id_medicamento',array());

				if(!empty($items_1->id_medicamento)){
					$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_1->id_medicamento))->nombre;
				}else{
					$medicamento = "";
				}

				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'nombre_1',
					'value'=>$medicamento,
					'model'=>$items_1,
					'source'=>$this->createUrl('ItemSolicitud/Autocomplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
						'minLength'=>'1',
	        			'showAnim'=>'fold',
	        			'select'=>"js:function(event, ui) { 
								$('#ItemSolicitud_1_id_stock').val(ui.item.id_stock); 
								$('#ItemSolicitud_1_id_medicamento').val(ui.item.id_medicamento); 
							}"
					),
					'htmlOptions'=>array(
						'style'=>'width:350px;',
						'title'=>'Indique el medicamento que desea solicitar.'
					),
				));
				?>
			</td>
			<td>
				<?php echo $form->textField($items_1,'[1]cantidad',array('size'=>10,'maxlength'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				//echo $form->hiddenField($items_2,'[2]id_stock',array());
				echo $form->hiddenField($items_2,'[2]id_medicamento',array());

				if(!empty($items_2->id_medicamento)){
					$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_2->id_medicamento))->nombre;
				}else{
					$medicamento = "";
				}

				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'nombre_2',
					'value'=>$medicamento,
					'model'=>$items_2,
					'source'=>$this->createUrl('ItemSolicitud/Autocomplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
						'minLength'=>'1',
	        			'showAnim'=>'fold',
	        			'select'=>"js:function(event, ui) { 
								$('#ItemSolicitud_2_id_stock').val(ui.item.id_stock); 
								$('#ItemSolicitud_2_id_medicamento').val(ui.item.id_medicamento); 
							}"
					),
					'htmlOptions'=>array(
						'style'=>'width:350px;',
						'title'=>'Indique el medicamento que desea solicitar.'
					),
				));
				?>
			</td>
			<td>
				<?php echo $form->textField($items_2,'[2]cantidad',array('size'=>10,'maxlength'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				//echo $form->hiddenField($items_3,'[3]id_stock',array());
				echo $form->hiddenField($items_3,'[3]id_medicamento',array());

				if(!empty($items_3->id_medicamento)){
					$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_3->id_medicamento))->nombre;
				}else{
					$medicamento = "";
				}

				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'nombre_3',
					'value'=>$medicamento,
					'model'=>$items_3,
					'source'=>$this->createUrl('ItemSolicitud/Autocomplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
						'minLength'=>'1',
	        			'showAnim'=>'fold',
	        			'select'=>"js:function(event, ui) { 
								$('#ItemSolicitud_3_id_stock').val(ui.item.id_stock); 
								$('#ItemSolicitud_3_id_medicamento').val(ui.item.id_medicamento); 
							}"
					),
					'htmlOptions'=>array(
						'style'=>'width:350px;',
						'title'=>'Indique el medicamento que desea solicitar.'
					),
				));
				?>
			</td>
			<td>
				<?php echo $form->textField($items_3,'[3]cantidad',array('size'=>10,'maxlength'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				//echo $form->hiddenField($items_4,'[4]id_stock',array());
				echo $form->hiddenField($items_4,'[4]id_medicamento',array());

				if(!empty($items_4->id_medicamento)){
					$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_4->id_medicamento))->nombre;
				}else{
					$medicamento = "";
				}

				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'nombre_4',
					'value'=>$medicamento,
					'model'=>$items_4,
					'source'=>$this->createUrl('ItemSolicitud/Autocomplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
						'minLength'=>'1',
	        			'showAnim'=>'fold',
	        			'select'=>"js:function(event, ui) { 
								$('#ItemSolicitud_4_id_stock').val(ui.item.id_stock); 
								$('#ItemSolicitud_4_id_medicamento').val(ui.item.id_medicamento); 
							}"
					),
					'htmlOptions'=>array(
						'style'=>'width:350px;',
						'title'=>'Indique el medicamento que desea solicitar.'
					),
				));
				?>
			</td>
			<td>
				<?php echo $form->textField($items_4,'[4]cantidad',array('size'=>10,'maxlength'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				//echo $form->hiddenField($items_5,'[5]id_stock',array());
				echo $form->hiddenField($items_5,'[5]id_medicamento',array());

				if(!empty($items_5->id_medicamento)){
					$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_5->id_medicamento))->nombre;
				}else{
					$medicamento = "";
				}

				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'nombre_5',
					'value'=>$medicamento,
					'model'=>$items_5,
					'source'=>$this->createUrl('ItemSolicitud/Autocomplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
						'minLength'=>'1',
	        			'showAnim'=>'fold',
	        			'select'=>"js:function(event, ui) { 
								$('#ItemSolicitud_5_id_stock').val(ui.item.id_stock); 
								$('#ItemSolicitud_5_id_medicamento').val(ui.item.id_medicamento); 
							}"
					),
					'htmlOptions'=>array(
						'style'=>'width:350px;',
						'title'=>'Indique el medicamento que desea solicitar.'
					),
				));
				?>
			</td>
			<td>
				<?php echo $form->textField($items_5,'[5]cantidad',array('size'=>10,'maxlength'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				//echo $form->hiddenField($items_6,'[6]id_stock',array());
				echo $form->hiddenField($items_6,'[6]id_medicamento',array());

				if(!empty($items_6->id_medicamento)){
					$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_6->id_medicamento))->nombre;
				}else{
					$medicamento = "";
				}

				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'nombre_6',
					'value'=>$medicamento,
					'model'=>$items_6,
					'source'=>$this->createUrl('ItemSolicitud/Autocomplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
						'minLength'=>'1',
	        			'showAnim'=>'fold',
	        			'select'=>"js:function(event, ui) { 
								$('#ItemSolicitud_6_id_stock').val(ui.item.id_stock); 
								$('#ItemSolicitud_6_id_medicamento').val(ui.item.id_medicamento); 
							}"
					),
					'htmlOptions'=>array(
						'style'=>'width:350px;',
						'title'=>'Indique el medicamento que desea solicitar.'
					),
				));
				?>
			</td>
			<td>
				<?php echo $form->textField($items_6,'[6]cantidad',array('size'=>10,'maxlength'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				//echo $form->hiddenField($items_7,'[7]id_stock',array());
				echo $form->hiddenField($items_7,'[7]id_medicamento',array());

				if(!empty($items_7->id_medicamento)){
					$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_7->id_medicamento))->nombre;
				}else{
					$medicamento = "";
				}

				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'nombre_7',
					'value'=>$medicamento,
					'model'=>$items_7,
					'source'=>$this->createUrl('ItemSolicitud/Autocomplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
						'minLength'=>'1',
	        			'showAnim'=>'fold',
	        			'select'=>"js:function(event, ui) { 
								$('#ItemSolicitud_7_id_stock').val(ui.item.id_stock); 
								$('#ItemSolicitud_7_id_medicamento').val(ui.item.id_medicamento); 
							}"
					),
					'htmlOptions'=>array(
						'style'=>'width:350px;',
						'title'=>'Indique el medicamento que desea solicitar.'
					),
				));
				?>
			</td>
			<td>
				<?php echo $form->textField($items_7,'[7]cantidad',array('size'=>10,'maxlength'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				//echo $form->hiddenField($items_8,'[8]id_stock',array());
				echo $form->hiddenField($items_8,'[8]id_medicamento',array());

				if(!empty($items_8->id_medicamento)){
					$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_8->id_medicamento))->nombre;
				}else{
					$medicamento = "";
				}

				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'nombre_8',
					'value'=>$medicamento,
					'model'=>$items_8,
					'source'=>$this->createUrl('ItemSolicitud/Autocomplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
						'minLength'=>'1',
	        			'showAnim'=>'fold',
	        			'select'=>"js:function(event, ui) { 
								$('#ItemSolicitud_8_id_stock').val(ui.item.id_stock); 
								$('#ItemSolicitud_8_id_medicamento').val(ui.item.id_medicamento); 
							}"
					),
					'htmlOptions'=>array(
						'style'=>'width:350px;',
						'title'=>'Indique el medicamento que desea solicitar.'
					),
				));
				?>
			</td>
			<td>
				<?php echo $form->textField($items_8,'[8]cantidad',array('size'=>10,'maxlength'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				//echo $form->hiddenField($items_9,'[9]id_stock',array());
				echo $form->hiddenField($items_9,'[9]id_medicamento',array());

				if(!empty($items_9->id_medicamento)){
					$medicamento = Medicamentos::model()->findByAttributes(array('id_medicamento'=>$items_9->id_medicamento))->nombre;
				}else{
					$medicamento = "";
				}

				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'nombre_9',
					'value'=>$medicamento,
					'model'=>$items_9,
					'source'=>$this->createUrl('ItemSolicitud/Autocomplete'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
						'minLength'=>'1',
	        			'showAnim'=>'fold',
	        			'select'=>"js:function(event, ui) { 
								$('#ItemSolicitud_9_id_stock').val(ui.item.id_stock); 
								$('#ItemSolicitud_9_id_medicamento').val(ui.item.id_medicamento); 
							}"
					),
					'htmlOptions'=>array(
						'style'=>'width:350px;',
						'title'=>'Indique el medicamento que desea solicitar.'
					),
				));
				?>
			</td>
			<td>
				<?php echo $form->textField($items_9,'[9]cantidad',array('size'=>10,'maxlength'=>5)); ?>
			</td>
		</tr>
		</table>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><BR>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(){
	    $('input[type=text]').keyup(function(){
	        $(this).val($(this).val().toUpperCase());
	    });
	});
</script>