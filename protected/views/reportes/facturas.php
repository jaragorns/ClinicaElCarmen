<?php

$this->breadcrumbs=array(
	'Reportes',
	'Facturas',
);

?>
<br>
<br>
<h1>Reporte de Facturas</h1>

<p>
* El <b>Reporte General</b> le mostrará todas las facturas existentes. <br>
* El <b>Reporte por Proveedor</b> le mostrará todas las facturas asociadas a un proveedor específico.<br>
* Si selecciona <b>Todos los Proveedores</b> se le mostrará un reporte de todas las facturas a la fecha de todos los proveedores. <br>
*  El <b>Rango de Fechas</b> le permite seleccionar las facturas existentes para un período de tiempo dado, bien sea de 
	todos los proveedores o para uno en específico. <br>
* Si desea imprimir una factura específica debe buscar dicha factura y seleccionar la opción Ver, luego Imprimir. 
</p>

<?php //$this->renderPartial('_facturas'); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reporteFacturas-form',
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
			<td><?php echo Chtml::label('Proveedor:', 'pro', array()); ?></td>
			<td><?php
			echo Chtml::hiddenField('id_pro', '', array());

			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    				'name'=>'name',
    				'value'=>'',
    				'source'=>$this->createUrl('Reportes/AutocompletePro'),
    				// additional javascript options for the autocomplete plugin
    				'options'=>array(
    					'minLength'=>'1',
            			'showAnim'=>'fold',
            			'select'=>"js:function(event, ui) { 
								$('#id_pro').val(ui.item.id_pro);
							}"
    				),
    				'htmlOptions'=>array(
						'style'=>'width:400px;',
						'placeholder'=>'Nombre del Proveedor...',
						'title'=>'Indique el nombre del Proveedor que desea consultar.'
					),
			));
		?></td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('Todos los Proveedores',false); ?></td>
			<td><?php echo Chtml::checkBox('allPro', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
		</tr>
	</table>
	<br>
	<table>
		<tr>
			<td><?php echo Chtml::label('Fecha Factura (Desde):', 'ffd', array()); ?></td>
			<td><?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'ffd',
			    //'language'=>Yii::app()->getLanguage(),
			    'options'=>array(
			        'showAnim'=>'fold',
			        'changeMonth' => 'true', 
    				'changeYear' => 'true',
    				'dateFormat'=>'dd-mm-yy',
			    ),
			));
		
			?></td>
			<td><?php echo Chtml::label('Fecha Factura (Hasta):', 'ffh', array()); ?></td>
			<td><?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'ffh',
			    //'language'=>Yii::app()->getLanguage(),
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
table, th, td {
    padding: 10px;
}
table {
    border-spacing: 15px;
}
</style>