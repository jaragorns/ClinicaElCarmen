<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_solicitud'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'fecha_solicitud',array('placeholder'=>'YYYY-mm-dd')); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'estacion_id_estacion'); ?>
	</div>
	<div class="media">
		<?php echo $form->dropDownList($model,'estacion_id_estacion',
				CHtml::listData(
					Estaciones::model()->findAll(array('condition'=>'id_estacion NOT IN (1,7)')),'id_estacion','nombre'),	array('class' => 'my-drop-down','prompt'=>'Servicio:',)); ?>	
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'cantidad'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'cantidad'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'usuarios'); ?>
	</div>
	<div class="media">
		<?php echo $form->dropDownList($model,'usuarios',
				CHtml::listData(
					Usuarios::model()->findAll(array('condition'=>'itemname = "Enfermeria"', 'order'=>'nombres')),'id','NombreCompleto'),array('class' => 'my-drop-down','prompt'=>'Seleccione:',)); ?>	
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'stock_id_stock'); ?>
	</div>
	<div class="media">
		<?php //echo $form->dropDownList($model,'stock_id_stock',
			//	CHtml::listData(
			//		Medicamentos::model()->findAll(array('condition'=>'1=1')),'id_medicamento','nombre'),array('class' => 'my-drop-down','prompt'=>'Seleccione:',)); 

		echo $form->hiddenField($model,'stock_id_stock',array());

			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'medicamento',
			    'value'=>'',
			    'model'=>$model,
			    'source'=>$this->createUrl('Solicitudes/Autocomplete2'),
			    // additional javascript options for the autocomplete plugin
			    'options'=>array(
			    	'minLength'=>'1',
			    	'showAnim'=>'fold',
			    	'select'=>"js:function(event, ui) { 
	       				$('#Solicitudes_stock_id_stock').val(ui.item.stock_id_stock); 
	       			}"
			    ),
			    'htmlOptions'=>array(
		        	'style'=>'width:436px;',
		        	'placeholder'=>'Nombre del medicamento...',
		        	'title'=>'Indique el medicamento que desea buscar.'
	    		),
			));

		?>		
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'estado'); ?>
	</div>
	<div class="media">
		<?php $estado = array('0'=>'Pendiente','1'=>'Asignado', '2'=>'Rechazado');
				echo $form->dropDownList($model, 'estado', $estado, array('class' => 'my-drop-down','empty'=>'Seleccione:',)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form --> 