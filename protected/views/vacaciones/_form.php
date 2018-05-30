<?php
/* @var $this VacacionesController */
/* @var $model Vacaciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacaciones-form',
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
		<?php echo $form->labelEx($model,'id_usuario'); ?>
	</div>
	<div class="media">
		<?php 
			echo $form->dropDownList(
				$model,
				'id_usuario',
				CHtml::listData(
					Usuarios::model()->findAll(),
					'id',
					'NombreCompleto'),
				array(
					'class' => 'my-drop-down',
					'empty'=>'-- Seleccione un Empleado --',
				)
			);
		?> 
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>
	</div>
	<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha_inicio',
	                'model'=>$model,
	                'value' => $model->fecha_inicio,
	                'language'=> Yii::app()->language,
	                'options'=>array (
	                    'showSecond'=>true,
	                    'dateFormat'=>'yy-mm-dd',
	                ),  
	            )   
	        );
		
		?>
		<?php echo $form->error($model,'fecha_inicio'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'fecha_fin'); ?>
	</div>
	<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha_fin',
	                'model'=>$model,
	                'value' => $model->fecha_fin,
	                'language'=> Yii::app()->language,
	                'options'=>array (
	                    'showSecond'=>true,
	                    'dateFormat'=>'yy-mm-dd',
	                ),  
	            )   
	        );
		
		?>
		<?php echo $form->error($model,'fecha_fin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(){
	    $('input[type=text]').keyup(function(){
	        $(this).val($(this).val().toUpperCase());
	    });
	});
</script>