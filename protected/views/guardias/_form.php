<?php
/* @var $this GuardiasController */
/* @var $model Guardias */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guardias-form',
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
		<?php echo $form->labelEx($model,'mes'); ?>
	</div>
	<div class="media">
		<?php
		$meses = array('1'=>'Enero','2'=>'Febrero', '3'=>'Marzo', '4'=>'Abril', '5'=>'Mayo', '6'=>'Junio', '7'=>'Julio', '8'=>'Agosto', '9'=>'Septiembre','10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');
		echo $form->dropDownList($model, 'mes', $meses, array(
					'class' => 'my-drop-down',
					'empty'=>'--Mes--',
				));	 ?>
		<?php echo $form->error($model,'mes'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'ano'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'ano',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'ano'); ?>
	</div>

	<table>
		<tr>
			<td><?php echo $form->labelEx($model,'id_usuario'); ?></td>
			<td><?php echo $form->labelEx($model,'id_estacion'); ?></td>
			<?php /*
				for ($i=1; $i <=31 ; $i++) { ?>
					<td><?php echo $form->labelEx($model,'dia_'.$i); ?>
			</td>	
			<?php } */ ?>	
		</tr>
		<tr>
			<td>
				<?php
				echo $form->dropDownList($model,'id_usuario',
				CHtml::listData(
					Usuarios::model()->findAll(array(
						'condition'=>'cargo = "Enfermera" OR cargo = "Jefe_Enfermera" ')),
						'id','NombreCompleto'),	
					array('class' => 'my-drop-down',
						'prompt'=>'Enfermera:'
						)); 
				?>
			</td>
			<td>
				<?php 
				echo $form->dropDownList($model,'id_estacion',
				CHtml::listData(
					Estaciones::model()->findAll(array(
						'condition'=>'nombre != "Farmacia"')),
						'id_estacion','nombre'),	
					array('class' => 'my-drop-down',
						  'prompt'=>'Servicio:'
						)); 
						?>
			</td>
		</tr>
	</table>
	<br><br>

	<table>
		<tr>
			<?php 
				for ($i=1; $i <=15 ; $i++) { ?>
					<td><?php echo $form->labelEx($model,'dia_'.$i); ?>
			</td>	
			<?php }  ?>	
		</tr>
		<tr>
			<?php 
			for ($i=1; $i <=15 ; $i++) { 
				?>
					<td><?php 
					echo $form->dropDownList($model,'dia_'.$i,
						CHtml::listData(
						Turnos::model()->findAll(array(
							'condition'=>'abreviatura != "V"')),
						'id_turno','abreviatura'),	
					array('class' => 'my-drop-down',
							'prompt'=>'Turno'
						)); ?> 
					</td>	

			<?php } ?>	
		</tr>
		<tr><td><br></td></tr>
		<tr>
			<?php 
				for ($i=16; $i <=31 ; $i++) { ?>
					<td><?php echo $form->labelEx($model,'dia_'.$i); ?>
			</td>	
			<?php }  ?>	
		</tr>
		<tr>
			<?php 
			for ($i=16; $i <=31 ; $i++) { 
				?>
					<td><?php echo $form->dropDownList($model,'dia_'.$i,
						CHtml::listData(
						Turnos::model()->findAll(array(
							'condition'=>'abreviatura != "V"')),
						'id_turno','abreviatura'),	
					array('class' => 'my-drop-down',
							'prompt'=>'Turno')); ?>
					</td>	

			<?php } ?>	
		</tr>
	</table>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
