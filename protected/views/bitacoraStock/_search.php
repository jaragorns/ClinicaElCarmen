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
		<?php
			echo $form->hiddenField($model,'id_usuario',array());

			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'usuario',
				'value'=>'',
				'source'=>$this->createUrl('Reportes/Autocomplete'),
				// additional javascript options for the autocomplete plugin
				'options'=>array(
			    	'minLength'=>'1',
			        'showAnim'=>'fold',
			        'select'=>"js:function(event, ui) { 
						$('#BitacoraStock_id_usuario').val(ui.item.id_usuario);
					}"
				),
				'htmlOptions'=>array(
					'style'=>'width:300px;',
					'placeholder'=>'Nombre del Empleado...',
					'title'=>'Indique el nombre del Empleado que desea consultar.'
				),
			));
		?>
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
		        	'style'=>'width:300px;',
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
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha',
	                'model'=>$model,
	                'value' => $model->fecha,
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