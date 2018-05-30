<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowcontact">
		<?php echo $form->label($model,'fecha_solicitud'); ?>
	</div>
	<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', 
				array(
					'attribute'=>'fecha_solicitud',
	                'model'=>$model,
	                'value' => $model->fecha_solicitud,
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
		<?php echo $form->label($model,'estacion_id_estacion'); ?>
	</div>
	<div class="media">
		<?php 
			$sql2 = 'SELECT * FROM Estaciones WHERE id_estacion NOT IN ("1","7")'; 
			echo $form->dropDownList($model,'estacion_id_estacion',
			CHtml::listData(
				Estaciones::model()->findAllBySql($sql2),'id_estacion','nombre'),	array('class' => 'my-drop-down','prompt'=>'Seleccionar:',)); ?> 
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'usuarios'); ?>
	</div>
	<div class="media">
		<?php echo $form->dropDownList($model,'usuarios',
				CHtml::listData(
					Usuarios::model()->findAll(array('condition'=>'cargo=:cargo','params'=>array(':cargo'=>'Enfermera'))),
					'id','NombreCompleto'),	array('class' => 'my-drop-down','prompt'=>'Enfermera:',)); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->label($model,'estado'); ?>
	</div>
	<div class="media">
		<?php echo CHtml::dropDownList('estado', $model, 
              array('0' => 'Pendiente', '1' => 'En Proceso', '2' => 'Procesada'),
              array('empty' => 'Seleccionar:')); ?>
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