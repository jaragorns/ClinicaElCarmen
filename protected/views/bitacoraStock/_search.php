<?php
/* @var $this BitacoraStockController */
/* @var $model BitacoraStock */
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
		<?php echo $form->textField($model,'id_usuario'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_estacion_origen'); ?>
	</div>
	<div class="media">
		<?php 
			echo $form->dropDownList(
				$model,
				'id_estacion_origen',
				CHtml::listData(
					Estaciones::model()->findAll(array('condition'=>'id_estacion NOT IN (1,7)',)),
					'id_estacion',
					'nombre'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione Servicio --',
				)
			);
		?>	
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_estacion_destino'); ?>
	</div>
	<div class="media">
		<?php 
			echo $form->dropDownList(
				$model,
				'id_estacion_destino',
				CHtml::listData(
					Estaciones::model()->findAll(array('condition'=>'id_estacion NOT IN (1,7)',)),
					'id_estacion',
					'nombre'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione Servicio --',
				)
			);
		?>	
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'id_medicamento'); ?>
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
	       				$('#BitacoraStock_id_medicamento').val(ui.item.id_medicamento); 
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
		<?php echo $form->label($model,'fecha'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'fecha',array('placeholder'=>"2015-10-25 22:02",'size'=>30,'maxlength'=>17)); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->