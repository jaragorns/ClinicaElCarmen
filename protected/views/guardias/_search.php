<?php
/* @var $this GuardiasController */
/* @var $model Guardias */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	
	<table>
		<tr>
			<td>
				<?php echo $form->label($model,'mes'); ?>
				<?php
				$meses = array('1'=>'Enero','2'=>'Febrero', '3'=>'Marzo', '4'=>'Abril', '5'=>'Mayo', '6'=>'Junio', '7'=>'Julio', '8'=>'Agosto', '9'=>'Septiembre','10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');
				echo $form->dropDownList($model, 'mes', $meses, array('class' => 'my-drop-down','empty'=>'--Mes--',));	 ?>
			</td>
			<td>
				<?php echo $form->label($model,'ano'); ?>
				<?php echo $form->textField($model,'ano',array('size'=>4,'maxlength'=>4)); ?>					
			</td>
			<td>
				<?php echo $form->label($model,'id_usuario'); ?>
				<?php echo $form->dropDownList($model,'id_usuario',
				CHtml::listData(
					Usuarios::model()->findAll(array('condition'=>'itemname=:itemname','params'=>array(':itemname'=>'Enfermeria'))),
					'id','NombreCompleto'),	array('class' => 'my-drop-down','prompt'=>'Enfermera:',)); ?>
			</td>
			<td>
				<?php echo $form->label($model,'id_estacion'); ?>
				<?php echo $form->dropDownList($model,'id_estacion',
				CHtml::listData(
					Estaciones::model()->findAll(),'id_estacion','nombre'),	array('class' => 'my-drop-down','prompt'=>'Servicio:',)); ?>	
			</td>
		</tr>
	</table>

	<table>
		<tr>
			<?php 
				for ($i=1; $i<=31 ; $i++) { ?>
					<td>	
					<?php echo $form->label($model,'dia_'.$i); ?>
					<?php echo $form->dropDownList($model,'dia_'.$i,
					CHtml::listData(
						Turnos::model()->findAll(),'id_turno','abreviatura'),array('class' => 'my-drop-down','prompt'=>'-',)); ?>
					</td>	
				<?php }
			?>			
		</tr>
	</table>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Search'),  array("class"=>"btn btn-primary btn-large")); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->