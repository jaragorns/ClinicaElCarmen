<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/libre.css');

$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	$model->id_solicitud,
);

$this->menu=array(
	array('label'=>'Lista de Solicitudes', 'url'=>array('index')),
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Gestionar Solicitudes', 'url'=>array('admin')),
);
?>

<h1>Solicitud #<?php echo $model->id_solicitud; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name' => 'fecha_solicitud',
			'value' => date_format(date_create($model->fecha_solicitud),'d-m-Y')
		),
		array(
			'name' => 'estacion_id_estacion',
			'value' => Estaciones::model()->findByAttributes(array('id_estacion'=>$model->estacion_id_estacion))->nombre
		),
		array(
			'name' => 'usuarios',
			'value' => Usuarios::model()->findByAttributes(array('id'=>$model->usuarios))->NombreCompleto.' - ('.
						Estaciones::model()->findByAttributes(array('id_estacion'=>
							Guardias::model()->findByAttributes(array('id_guardia'=>$model->guardias_id_guardia))->id_estacion))->nombre
	  .')' 
		),
	),
)); ?>
<br><br>
<?php 
	$sql = "SELECT * FROM item_solicitud WHERE id_solicitud=".$model->id_solicitud; 
	$data = ItemSolicitud::model()->findAllBySql($sql);
?>
<table class="anchoSol">
	<tr>
		<th class="colum1"><b><?php echo $model->getAttributeLabel('Medicamento') ;?></b></th>
		<th class="align"><b><?php echo $model->getAttributeLabel('Cantidad') ;?></b></th>
		<th class="align"><b><?php echo $model->getAttributeLabel('Estado') ;?></b></th>
	</tr>
	<?php for($i=0; $i<count($data); $i++){ 
		if(fmod($i,2)==0){
	 ?>
	 	<tr>
			<td class="color1"><?php  echo Medicamentos::model()->findByAttributes(array('id_medicamento'=>$data[$i]->id_medicamento))->nombre ?></td>
			<td class="colorAli"><?php echo $data[$i]['cantidad']?></td>
			<td class="colorAli"><?php echo strtr($data[$i]['estado'], array("0" => "Pendiente","1" => "Asignado","2" => "Rechazado")) ?></td>
		</tr>
	<?php 
		}else{ ?>
		<tr>
			<td class="color2"><?php  echo Medicamentos::model()->findByAttributes(array('id_medicamento'=>$data[$i]->id_medicamento))->nombre ?></td>
			<td class="colorAli2"><?php echo $data[$i]['cantidad']?></td>
			<td class="colorAli2"><?php echo strtr($data[$i]['estado'], array("0" => "Pendiente","1" => "Asignado","2" => "Rechazado")) ?></td>
		</tr>

		<?php }	
	}
	?>
</table>
