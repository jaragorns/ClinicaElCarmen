<?php
/* @var $this TicketsController */
/* @var $model Tickets */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_medicamento'); ?>
	</div>
	<div class="media">
		<?php
			echo $form->hiddenField($model,'id_medicamento',array());
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'id_medicamento',
			    'value'=>'',
			    'model'=>$model,
			    'source'=>$this->createUrl('Stock/Autocomplete'),
			    // additional javascript options for the autocomplete plugin
			    'options'=>array(
			    	'minLength'=>'1',
			    	'showAnim'=>'fold',
			    	'select'=>"js:function(event, ui) { 
	       				$('#Tickets_id_medicamento').val(ui.item.id_medicamento); 
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
		<?php echo $form->label($model,'cantidad'); ?>
	</div>
	<div class="media">
		<?php  echo $form->numberField($model,'cantidad',array('min'=>0, 'max'=>999999)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'estado'); ?>
	</div>
	<div class="media">
		<?php echo CHtml::dropDownList('estado', $model, 
              array('0' => 'Pendiente', '1' => 'Aprobado', '2' => 'Rechazado'),
              array('empty' => 'Seleccionar:')); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->