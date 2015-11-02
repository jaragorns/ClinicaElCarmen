<?php

$this->breadcrumbs=array(
	'Reportes',
	'Inventario',
);

?>
<br>
<h1>Reporte de Inventario</h1>

<p align="justify">
	* El <b>Reporte General </b> le mostrar&aacute; la cantidad de medicamentos existentes en cada uno de los servicios. <br>
	* Si selecciona un <b>Servicio</b> se mostrar&aacute; el inventario existente en dicho servicio. <br>
	* Si selecciona un <b>Medicamento</b> se mostrar&aacute; la cantidad existente de ese medicamento en cada uno de los servicios. <br>
	* Si selecciona el <b>Servicio</b> y a su vez un <b>Medicamento</b> se mostrar&aacute; la cantidad disponible de ese medicamento en ese servicio. <br><br>
	<b>NOTA:</b> Si la cantidad de alg&uacute;n medicamento es 0 no se mostrar&aacute; ese medicamento en el reporte, es decir, de no aparecer un medicamento en el reporte significa que no hay existencia del mismo.  
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reporteInventario-form',
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
			<td><?php echo Chtml::label('Inventario General',false); ?></td>
			<td><?php echo Chtml::checkBox('all', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('Servicio: ',false); ?></td>
			<td><?php 
				echo Chtml::dropDownList(
					'servicio',
					'servicio',
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
    				'name'=>'name',
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
	
	<br><br>
	<div class="row buttons">
		<input type="submit" value="Generar Reporte" class="btn btn-primary btn-large"></input>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->

<style>
table, th, td {
   	padding: 15px; 
}
table {
	padding: 5px;
    border-spacing: 15px;
}
</style>