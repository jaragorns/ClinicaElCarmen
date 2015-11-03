<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */
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
						$('#Proveedores_id_proveedor').val(ui.item.id_pro);
					}"
				),
				'htmlOptions'=>array(
					'style'=>'width:400px;',
					'placeholder'=>'Nombre del Proveedor...',
					'title'=>'Indique el nombre del Proveedor que desea consultar.'
				),
			));
		?> 
	</div>
	<div class="rowcontact">
		<?php echo $form->label($model,'rif'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'rif',array('size'=>10,'maxlength'=>10)); ?>
	</div>
	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- search-form -->