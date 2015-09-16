<?php
/* @var $this MedicamentosController */
/* @var $model Medicamentos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'nombre'); ?>
	</div>
	<div class="media">
		<?php
			echo $form->hiddenField($model,'id_medicamento',array());
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'medicamento',
			    'value'=>'',
			    'model'=>$model,
			    'source'=>$this->createUrl('Facturas/Autocomplete'),
			    // additional javascript options for the autocomplete plugin
			    'options'=>array(
			    	'minLength'=>'1',
			    	'showAnim'=>'fold',
			    	'select'=>"js:function(event, ui) { 
	       				$('#Medicamentos_id_medicamento').val(ui.item.id_medicamento); 
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
		<?php echo $form->label($model,'componente'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'componente',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'precio_contado'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'precio_contado',array('size'=>20,'maxlength'=>10)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'precio_seguro'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'precio_seguro',array('size'=>20,'maxlength'=>10)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'iva'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'iva',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->