<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Todos los campos son requeridos.</p>

	<?php if($form->errorSummary($model)!=""){ ?>
	<div class="alert alert-info">
    	<strong><?php echo $form->errorSummary($model);?></strong> 
    </div>
	<?php } ?>

	<?php if(empty($model->id)){ ?>
	
		<div class="rowcontact">
			<?php echo $form->labelEx($model,'id'); ?>
		</div>
		<div class="media">
			<?php echo $form->textField($model,'id',array('placeholder'=>"19123876",'size'=>30,'maxlength'=>8)); ?>
			<?php echo $form->error($model,'id'); ?>
		</div>

	<?php }else{ 
			if(Yii::app()->user->role=="Superadmin" OR Yii::app()->user->role=="Presidente" OR Yii::app()->user->role=="Vicepresidente"){ ?>
				<div class="rowcontact">
					<?php echo $form->labelEx($model,'id'); ?>
				</div>
				<div class="media">
					<?php echo $form->textField($model,'id',array('placeholder'=>"19123876",'size'=>30,'maxlength'=>8)); ?>
					<?php echo $form->error($model,'id'); ?>
				</div>
		<?php } 
	} ?>

	<div class="rowcontact">
		<?php //echo Yii::app()->user->role; ?>
		<?php echo $form->labelEx($model,'username'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'username',array('placeholder'=>"maria.perez",'size'=>30,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'password'); ?>
	</div>
	<div class="media">
		<?php echo $form->passwordField($model,'password',array('type'=>"password",'size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<?php if(empty($model->cargo)){ ?>
		<div class="rowcontact">
			<?php echo $form->labelEx($model,'cargo'); ?>
		</div>
		<div class="media">
			<?php echo $form->textField($model,'cargo',array('placeholder'=>"Enfermera",'size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model,'cargo'); ?>
		</div>

		<div class="rowcontact">
			<?php echo $form->labelEx($model,'nombres'); ?>
		</div>
		<div class="media">
			<?php echo $form->textField($model,'nombres',array('placeholder'=>"Maria",'size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model,'nombres'); ?>
		</div>

		<div class="rowcontact">
			<?php echo $form->labelEx($model,'apellidos'); ?>
		</div>
		<div class="media">
			<?php echo $form->textField($model,'apellidos',array('placeholder'=>"Perez",'size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model,'apellidos'); ?>
		</div>
	<?php }else{ 
			if(Yii::app()->user->role=="Superadmin" OR Yii::app()->user->role=="Presidente" OR Yii::app()->user->role=="Vicepresidente"){ ?>
				<div class="rowcontact">
					<?php echo $form->labelEx($model,'cargo'); ?>
				</div>
				<div class="media">
					<?php echo $form->textField($model,'cargo',array('placeholder'=>"Enfermera",'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'cargo'); ?>
				</div>

				<div class="rowcontact">
					<?php echo $form->labelEx($model,'nombres'); ?>
				</div>
				<div class="media">
					<?php echo $form->textField($model,'nombres',array('placeholder'=>"Maria",'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'nombres'); ?>
				</div>

				<div class="rowcontact">
					<?php echo $form->labelEx($model,'apellidos'); ?>
				</div>
				<div class="media">
					<?php echo $form->textField($model,'apellidos',array('placeholder'=>"Perez",'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'apellidos'); ?>
				</div>
		<?php }
	} ?>


	<div class="rowcontact">
		<?php echo $form->labelEx($model,'telefono'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'telefono',array('placeholder'=>"",'size'=>12,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="rowcontact">
		<?php echo $form->labelEx($model,'email :'); ?>
	</div>
	<div class="media">
		<?php echo $form->textField($model,'email',array('placeholder'=>"ejemplo@gmail.com",'size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<?php if(Yii::app()->user->role=="Superadmin" || Yii::app()->user->role=="Presidente" || Yii::app()->user->role=="Vicepresidente"){ ?>
	<div class="rowcontact"> 
		<?php echo $form->labelEx($rol_user,'[1]Rol : '); ?>
	</div>
	<div class="media">
		<?php echo $form->dropDownList(
				$rol_user,
				'[1]itemname',
				CHtml::listData(
					$roles=Authitem::model()->findAll(array('condition'=>'type=:type','params'=>array(':type'=>2),)),
					'name',
					'name'),
				array(
					'class' => 'my-drop-down',
					'prompt'=>'-- Seleccione un Rol --',
				)
			);
		?> 
		<?php echo $form->error($model,'[1]itemname'); ?>
	</div>
	<?php } ?>
	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->