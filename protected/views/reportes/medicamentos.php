<?php

$this->breadcrumbs=array(
	'Reportes',
	'Medicamentos',
);

?>
<br>
<br>
<h1>Reporte de Medicamentos</h1>
<br>
<p>
	* Seleccione los campos de la información que desea obtener en el reporte:	
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reporteMedicamentos-form',
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
			<td><?php echo Chtml::label('Nombre del Medicamento',false); ?></td>
			<td><?php echo Chtml::checkBox('nom', true, array('checkValue'=>1, 'uncheckValue'=>0)); ?>	</td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('Componente(s) del Medicamento',false); ?></td>
			<td><?php echo Chtml::checkBox('com', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?>	</td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('Unidad de Medida',false); ?></td>
			<td><?php echo Chtml::checkBox('med', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?>	</td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('Cantidad',false); ?></td>
			<td><?php echo Chtml::checkBox('can', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?>	</td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('Precio Contado',false); ?></td>
			<td><?php echo Chtml::checkBox('pc', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?>	</td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('Precio Seguro',false); ?></td>
			<td><?php echo Chtml::checkBox('ps', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?>	</td>
		</tr>
		<tr>
			<td><?php echo Chtml::label('% IVA',false); ?></td>
			<td><?php echo Chtml::checkBox('iva', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?>	</td>
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
    padding: 5px;
}
table {
    border-spacing: 10px;
}
</style>