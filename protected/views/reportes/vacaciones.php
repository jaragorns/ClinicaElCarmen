<?php

$this->breadcrumbs=array(
	'Reportes',
	'Vacaciones',
);

?>
<br>
<br>
<h1>Reporte de Vacaciones</h1>

<p>
	* Si selecciona el <b>Empleado</b> se le mostrará todos los períodos vacacionales asociados al mismo. <br>
	* La opción <b>Todos los empleados</b> muestra un historial de vacaciones de todos los empleados. <br>
	* El <b>Rango de Fechas</b> le permite obtener un reporte de vacaciones comprendidas entre las fechas dadas, 
		bien sea para un empleado o todos según su elección.
</p>
<?php // $this->renderPartial('_vacaciones'); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reporteVacaciones-form',
	'method'=>'get',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<br><br>
	<div class="rowcontact">
		<?php echo Chtml::label('Empleado:', 'id_usuario', array()); ?>
	</div>
	<div class="media">
		<?php
			echo Chtml::hiddenField('id_usuario', '', array());

			$empleado="";		
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    				'name'=>'name',
    				'value'=>$empleado,
    				'source'=>$this->createUrl('Reportes/Autocomplete'),
    				// additional javascript options for the autocomplete plugin
    				'options'=>array(
    					'minLength'=>'1',
            			'showAnim'=>'fold',
            			'select'=>"js:function(event, ui) { 
								$('#id_usuario').val(ui.item.id_usuario);
							}"
    				),
    				'htmlOptions'=>array(
						'style'=>'width:400px;',
						'placeholder'=>'Nombre del Empleado...',
						'title'=>'Indique el nombre del empleado que desea consultar.'
					),
			));
		?>
		<br><br>
		<?php echo Chtml::checkBox('all', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?>
		<?php echo Chtml::label('Todos los Empleados',false); ?>
	</div>

	<div class="rowcontact">
		<?php echo Chtml::label('Fecha Inicial:', 'fecha_inicio', array()); ?>
	</div>
	<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'fecha_inicio',
			    'language'=>'es',
			    'options'=>array(
			        'showAnim'=>'fold',
			        'changeMonth' => 'true', 
    				'changeYear' => 'true',
    				'dateFormat'=>'dd-mm-yy',
			    ),
			));
		
		?>
	</div>
	<div class="rowcontact">
		<?php echo Chtml::label('Fecha Final:', 'fecha_fin', array()); ?>
	</div>
	<div class="media">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'fecha_fin',
			    'language'=>'es',
			    'options'=>array(
			        'showAnim'=>'fold',
			        'changeMonth' => 'true', 
    				'changeYear' => 'true',
    				'dateFormat'=>'dd-mm-yy',
			    ),
			));
		
		?>
	</div>

	<div class="row buttons">
		<input type="submit" value="Generar Reporte" class="btn btn-primary btn-large"></input>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->