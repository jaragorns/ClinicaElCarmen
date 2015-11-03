<?php

$this->breadcrumbs=array(
	'Reportes',
	'Solicitudes',
);

?>
<br>
<h1>Reporte de Solicitudes</h1>

<p align="justify">
Estado de una solicitud: <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - <b>Pendientes: </b> Solicitudes existentes que se
     encuentran <b>pendientes</b> de aprobación por el servicio a quien han sido solicitadas. <br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - <b>En Proceso: </b> Solicitudes existentes que se 
     encuentran <b>en proceso</b> de aprobación por el servicio a quien han sido solicitadas. <br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - <b>Procesadas: </b> Solicitudes existentes que han sido 
     <b>procesadas</b> por el servicio a quien han sido solicitadas.
<br><br>
Puede obtener los siguientes reportes de solicitudes: <br><br>
* <b>Reporte General: </b> Todas las solicitudes existentes a la fecha de todos los servicios en los diferentes estados que existen. Si desea filtrar por estado (Pendiente, En Proceso, Procesadas) debe seleccionar las casillas correspondientes debajo de la opción Reporte General.<br>
* <b>Realizadas Por: </b> Todas las solicitudes existentes a la fecha realizadas o generadas por el servicio seleccionado. Si desea filtrar por estado asociadas a ese servicio debe seleccionar las casillas correspondientes debajo de la opción Realizadas por.<br>
* <b>Realizadas A: </b> Todas las solicitudes existentes a la fecha realizadas al servicio seleccionado. Si desea filtrar por estado asociadas a ese servicio debe seleccionar las casillas correspondientes debajo de la opción Realizadas A.<br><br>
El <b>Rango de Fechas</b> permite filtrar las solicitudes de cada uno de los reportes dada la fecha desde y hasta. 
     


</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reporteSolicitudes-form',
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
			<td></td>
			<td>
				<table>
					<tr>
						<td><?php echo Chtml::checkBox('allPen', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
						<td><?php echo Chtml::label('Pendientes',false); ?></td>			
					</tr>
					<tr>
						<td><?php echo Chtml::checkBox('allenPro', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
						<td><?php echo Chtml::label('En Proceso',false); ?></td>			
					</tr>
					<tr>
						<td><?php echo Chtml::checkBox('allPro', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
						<td><?php echo Chtml::label('Procesadas',false); ?></td>			
					</tr>	
				</table>
			</td>
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
			<td></td>
			<td>
				<table>
					<tr>
						<td><?php echo Chtml::checkBox('rpPen', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
						<td><?php echo Chtml::label('Pendientes',false); ?></td>			
					</tr>
					<tr>
						<td><?php echo Chtml::checkBox('rpenPro', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
						<td><?php echo Chtml::label('En Proceso',false); ?></td>			
					</tr>
					<tr>
						<td><?php echo Chtml::checkBox('rpPro', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
						<td><?php echo Chtml::label('Procesadas',false); ?></td>			
					</tr>	
				</table>
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
			<td></td>
			<td>
				<table>
					<tr>
						<td><?php echo Chtml::checkBox('raPen', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
						<td><?php echo Chtml::label('Pendientes',false); ?></td>			
					</tr>
					<tr>
						<td><?php echo Chtml::checkBox('raenPro', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
						<td><?php echo Chtml::label('En Proceso',false); ?></td>			
					</tr>
					<tr>
						<td><?php echo Chtml::checkBox('raPro', false, array('checkValue'=>1, 'uncheckValue'=>0)); ?></td>
						<td><?php echo Chtml::label('Procesadas',false); ?></td>			
					</tr>	
				</table>
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
table, th, td {
   	padding: 2px; 
}
table {
	padding: 5px;
    border-spacing: 15px;
}
</style>