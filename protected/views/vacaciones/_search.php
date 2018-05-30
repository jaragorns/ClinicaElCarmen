<?php
/* @var $this VacacionesController */
/* @var $model Vacaciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_usuario'); ?>
	</div>
	<div class="media">
		<?php
			echo $form->hiddenField($model,'id_usuario',array());
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'usuario',
			    'value'=>'',
			    'model'=>$model,
			    'source'=>$this->createUrl('Reportes/Autocomplete'),
			    // additional javascript options for the autocomplete plugin
			    'options'=>array(
			    	'minLength'=>'1',
			    	'showAnim'=>'fold',
			    	'select'=>"js:function(event, ui) { 
	       				$('#Vacaciones_id_usuario').val(ui.item.id_usuario); 
	       			}"
			    ),
			    'htmlOptions'=>array(
		        	'style'=>'width:300px;',
		        	'placeholder'=>'Nombre del empleado...',
		        	'title'=>'Indique el empleado que desea buscar.'
	    		),
			));
		?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_inicio'); ?>
	</div>
	<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha_inicio',
	                'model'=>$model,
	                'value' => $model->fecha_inicio,
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
		<?php echo $form->label($model,'fecha_fin'); ?>
	</div>
	<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha_fin',
	                'model'=>$model,
	                'value' => $model->fecha_fin,
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