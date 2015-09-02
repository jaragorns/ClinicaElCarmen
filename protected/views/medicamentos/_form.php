<?php
/* @var $this MedicamentosController */
/* @var $model Medicamentos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'medicamentos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php if($form->errorSummary($model)!=""){ ?>
	<div class="alert alert-info">
    	<strong><?php echo $form->errorSummary($model);?></strong> 
    </div>
	<?php } ?>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'nombre'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'nombre',array('placeholder'=>'ATAMEL','size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'componente'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'componente',array('placeholder'=>'ACETAMINOFEN','size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'componente'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'unidad_medida'); ?>
	</div>
	<div class="media">
		<?php 
			echo $form->dropDownList(
				$model,
				'unidad_medida',
				CHtml::listData(
					UnidadMedidas::model()->findAll(),
					'id_unidad_medidas',
					'abreviatura'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione Unidad de Medida --',
				)
			);
		?> 
		<?php echo $form->error($model,'unidad_medida'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'precio_contado'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'precio_contado',array('placeholder'=>'135.50','size'=>20,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'precio_contado'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'precio_seguro'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'precio_seguro',array('placeholder'=>'388.45','size'=>20,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'precio_seguro'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'iva'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'iva',array('placeholder'=>'12.00','size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'iva'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->