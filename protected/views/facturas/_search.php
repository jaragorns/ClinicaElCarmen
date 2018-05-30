<?php
/* @var $this FacturasController */
/* @var $model Facturas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_factura'); ?>
	</div>
	<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha_factura',
	                'model'=>$model,
	                'value' => $model->fecha_factura,
	                'language'=> Yii::app()->language,
	                'language'=>'es',
	                'options'=>array (
	                    'showSecond'=>true,
	                    'dateFormat'=>'yy-mm-dd',
	                ),  
	            )   
	        );
		?>
	</div>
	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_entrada'); ?>
	</div>
		<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha_entrada',
	                'model'=>$model,
	                'value' => $model->fecha_entrada,
	                'language'=> Yii::app()->language,
	                'language'=>'es',
	                'options'=>array (
	                    'showSecond'=>true,
	                    'dateFormat'=>'yy-mm-dd',
	                ),  
	            )   
	        );
		?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_vencimiento'); ?>
	</div>
		<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha_vencimiento',
	                'model'=>$model,
	                'value' => $model->fecha_vencimiento,
	                'language'=> Yii::app()->language,
	                'language'=>'es',
	                'options'=>array (
	                    'showSecond'=>true,
	                    'dateFormat'=>'yy-mm-dd',
	                ),  
	            )   
	        );
		?>
	</div>
	<div class="rowcontact">
		<?php echo $form->label($model,'monto'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'monto'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_proveedor'); ?>
	</div>
	<div class="media">
		<?php
			echo $form->hiddenField($model,'id_proveedor',array());

			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'name',
				'value'=>'',
				'source'=>$this->createUrl('Reportes/AutocompletePro'),
				// additional javascript options for the autocomplete plugin
				'options'=>array(
			    	'minLength'=>'1',
			        'showAnim'=>'fold',
			        'select'=>"js:function(event, ui) { 
						$('#Facturas_id_proveedor').val(ui.item.id_pro);
					}"
				),
				'htmlOptions'=>array(
					'style'=>'width:400px;',
					'placeholder'=>'Nombre del Proveedor...',
					'title'=>'Indique el nombre del Proveedor que desea consultar.'
				),
			));
		?>
		<?php echo $form->error($model,'id_proveedor'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<script type="text/javascript">
	$(document).ready(function(){
	    $('input[type=text]').keyup(function(){
	        $(this).val($(this).val().toUpperCase());
	    });
	});
</script>