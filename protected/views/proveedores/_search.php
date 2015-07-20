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
	<!--
	<div class="rowcontact">
		<?php //echo $form->label($model,'id_proveedor'); ?>
	</div>
	<div class="media">
		<?php //echo $form->textField($model,'id_proveedor'); ?>
	</div>
	-->

	<div class="rowcontact">
		<?php echo $form->label($model,'nombre'); ?>
	</div>
	<div class="media">
		<?php echo $form->dropDownList(
				$model,
				'nombre',
				CHtml::listData(
					Proveedores::model()->findAll(),
					'id_proveedor',
					'nombre'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione un Proveedor --',
				)
			);
		?> 
		<?php echo $form->error($model,'id_proveedor'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'rif'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'rif',array('size'=>10,'maxlength'=>10)); ?>
	</div>
	<!--
	<div class="rowcontact">
		<?php //echo $form->label($model,'telefono'); ?>
	</div>
	<div class="media">
		<?php //echo $form->textField($model,'telefono',array('size'=>45,'maxlength'=>45)); ?>
	</div>
	
	<div class="rowcontact">
		<?php //echo $form->label($model,'direccion'); ?>
	</div>
	<div class="media">
		<?php //echo $form->textField($model,'direccion',array('size'=>45,'maxlength'=>45)); ?>
	</div>
	
	<div class="rowcontact">
		<?php //echo $form->label($model,'email'); ?>
	</div>
	<div class="media">
		<?php //echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
	</div>
	-->
	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- search-form -->