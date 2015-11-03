<?php
/* @var $this StockController */
/* @var $model Stock */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'cantidad'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'cantidad'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'id_estacion'); ?>
	</div>
	<div class="media">
		<?php 
			echo $form->dropDownList(
				$model,
				'id_estacion',
				CHtml::listData(
					Estaciones::model()->findAll(array('condition'=>'id_estacion NOT IN (1,7)',)),
					'id_estacion',
					'nombre'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione Estación --',
				)
			);
		?> 
		<?php echo $form->error($model,'unidad_medida'); ?>
	</div>

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
			    'source'=>$this->createUrl('Facturas/Autocomplete'),
			    // additional javascript options for the autocomplete plugin
			    'options'=>array(
			    	'minLength'=>'1',
			    	'showAnim'=>'fold',
			    	'select'=>"js:function(event, ui) { 
	       				$('#Stock_id_medicamento').val(ui.item.id_medicamento); 
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

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->