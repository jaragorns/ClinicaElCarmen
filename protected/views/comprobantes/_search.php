<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'num_comprobante'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'num_comprobante',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'num_cheque'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'num_cheque',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'monto'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'monto'); ?>
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
	<div class="rowcontact">
		<?php echo $form->label($model,'bancos_id_bancos'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'bancos_id_bancos'); ?>
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