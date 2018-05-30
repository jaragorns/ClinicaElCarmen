<?php

$this->breadcrumbs=array(
	'Reportes',
	'Asignaciones',
);

?>
<br>
<h1>Reporte de Asignaciones</h1>

<p align="justify">
	* El <b>Reporte General</b> le mostrar&aacute; todas las asignaciones que han sido realizadas a la fecha. <br>
	* Si selecciona un <b>empleado</b> y/o enfermera el reporte le mostrar&aacute; las asignaciones que ha realizado dicho empleado a la fecha <br>
	* Si le selecciona un servicio en la opci&oacute;n <b>Realizadas Por</b> el reporte mostrar&aacute; todas las solicitudes que tienen como origen dicho servicio, es decir, lo que el servicio ha solicitado. <br>
	* Si le selecciona un servicio en la opci&oacute;n <b>Realizadas A</b> el reporte mostrar&aacute; todas las solicitudes que tienen como destino dicho servicio, es decir, lo que se le ha solicitado al servicio. <br>
	* Si selecciona un <b>Medicamento</b> el reporte le mostrar&aacute; las asignaciones realizadas de ese medicamento. <br>
	* El <b>Rango de Fechas</b> le permite filtrar desde una fecha inicial hasta una fecha final los reportes, dada cualquiera de las opciones anteriores. 
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reporteAsignaciones-form',
	'method'=>'get',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<br><br>

	<table>
		<tr>
			<td><?php echo Chtml::label('Reporte General',false); ?></td>
			<td><?php echo Chtml::checkBox('all', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('Empleado',false); ?></td>
			<td><?php
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
		?></td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('Realizadas Por: ',false); ?></td>
			<td><?php 
				echo Chtml::dropDownList(
					'reaPor',
					'reaPor',
					CHtml::listData(
						Estaciones::model()->findAll(array('condition'=>'id_estacion NOT IN ("1","7")')),
						'id_estacion',
						'nombre'),
					array(
						'class' => 'my-drop-down',
						'empty'=>'-- Seleccione un Servicio --',
					)
				);
			?> 
			</td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('Realizadas A: ',false); ?></td>
			<td><?php 
				echo Chtml::dropDownList(
					'reaA',
					'reaA',
					CHtml::listData(
						Estaciones::model()->findAll(array('condition'=>'id_estacion NOT IN ("1","7")')),
						'id_estacion',
						'nombre'),
					array(
						'class' => 'my-drop-down',
						'empty'=>'-- Seleccione un Servicio --',
					)
				);
			?> 
			</td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('Medicamento', false); ?></td>
			<td>
				<?php
			echo Chtml::hiddenField('id_medicamento', '', array());

			$medicamento="";		
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    				'name'=>'name2',
    				'value'=>$medicamento,
    				'source'=>$this->createUrl('Reportes/AutocompleteMed'),
    				// additional javascript options for the autocomplete plugin
    				'options'=>array(
    					'minLength'=>'1',
            			'showAnim'=>'fold',
            			'select'=>"js:function(event, ui) { 
								$('#id_medicamento').val(ui.item.id_medicamento);
							}"
    				),
    				'htmlOptions'=>array(
						'style'=>'width:400px;',
						'placeholder'=>'Nombre del Medicamento...',
						'title'=>'Indique el nombre del medicamento que desea consultar.'
					),
			));
		?>
			</td>
		</tr>	
	</table>
	<br>
	<table>
		<tr>
			<td><?php echo Chtml::label('Fecha (Desde):', 'ffd', array()); ?></td>
			<td><?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'ffd',
			    'language'=>Yii::app()->getLanguage(),
			    'options'=>array(
			        'showAnim'=>'fold',
			        'changeMonth' => 'true', 
    				'changeYear' => 'true',
    				'dateFormat'=>'dd-mm-yy',
			    ),
			));
		
			?></td>
			<td><?php echo Chtml::label('Fecha (Hasta):', 'ffh', array()); ?></td>
			<td><?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'ffh',
			    'language'=>Yii::app()->getLanguage(),
			    'options'=>array(
			        'showAnim'=>'fold',
			        'changeMonth' => 'true', 
    				'changeYear' => 'true',
    				'dateFormat'=>'dd-mm-yy',
			    ),
			));		
			?></td>
		</tr>
	</table>
	<br><br>
	<div class="row buttons">
		<input type="submit" value="Generar Reporte" class="btn btn-primary btn-large"></input>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->

<style>
table, tr, td {
   	padding: 10px; 
}
table {
	padding: 10px;
    border-spacing: 15px;
}
</style>
