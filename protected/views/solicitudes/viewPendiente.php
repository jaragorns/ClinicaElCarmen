<?php
/* @var $this SolicitudesController */
/* @var $model Solicitudes */
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/libre.css');

$this->breadcrumbs=array(
	'Solicitudes',
	$model->id_solicitud,
);

$this->menu=array(
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Mis Solicitudes', 'url'=>array('admin')),
	array('label'=>'Solicitudes Pendientes', 'url'=>array('adminPendiente')),
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
<br>

<?php 
	$estacionSolicita = Guardias::model()->findByAttributes(array('id_guardia'=>$model->guardias_id_guardia))->id_estacion;
  
  if($model->estado!=2){
      Yii::import('application.extensions.eeditable.*');
      $this->widget('zii.widgets.grid.CGridView', array(
      'id'=>'solicitudes-grid', 
      'dataProvider'=>$model->searchItems($model->id_solicitud),
      'columns'=>array(
        array(
                'name' => 'id_medicamento',
                'value' => 'Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->nombre',     
            ),
            array(
              'name' => 'Cantidad Solicitada',
              'value' => '$data->cantidad',
            ),
            array(
              'name' => 'Cantidad en Servicio',
              'value' => 'cantidadExistente('.$estacionSolicita.',$data->id_medicamento)',
            ),
            array(
              'name' => 'Mi Stock',
              'value' => 'miStock('.$model->estacion_id_estacion.',$data->id_medicamento)',
            ),
            array(
              'name' => 'Asignacion',
              'value' => '0',
              'class'=>'EEditableColumn', 'editable_type'=>'editbox',
              'action'=>array('Solicitudes/ajaxeditcolumnAsig'),
            ),
             array(
                'name'=>'estado',
                'value'=>'strtr($data->estado, array("0" => "Pendiente","1" => "Aprobado","2" => "Rechazado"))',
                'class'=>'EEditableColumn', 'editable_type'=>'select',
                'editable_options'=>array('0'=>'Pendiente','1'=>'Aprobado','2'=>'Rechazado'),
                'action'=>array('Solicitudes/ajaxeditcolumn'),
            ),
      ),
    ));  
  }else{ 
      $this->widget('zii.widgets.grid.CGridView', array(
      'id'=>'solicitudes-grid', 
      'dataProvider'=>$model->searchItems($model->id_solicitud),
      'columns'=>array(
        array(
                'name' => 'id_medicamento',
                'value' => 'Medicamentos::model()->findByAttributes(array("id_medicamento"=>$data->id_medicamento))->nombre',     
           //     'htmlOptions' => array('style'=>'text-align: left;'),      
            ),
            array(
              'name' => 'Cantidad Solicitada',
              'value' => '$data->cantidad',
            //  'htmlOptions' => array('style'=>'width:100px; text-align: center;'),
            ),
            array(
              'name' => 'Cantidad en Servicio',
              'value' => 'cantidadExistente('.$estacionSolicita.',$data->id_medicamento)',
            //  'htmlOptions' => array('style'=>'width:100px; text-align: center;'),
            ),
            array(
              'name' => 'Mi Stock',
              'value' => 'miStock('.$model->estacion_id_estacion.',$data->id_medicamento)',
            //  'htmlOptions' => array('style'=>'width:100px; text-align: center;'),
            ),
            array(
              'name' => 'Asignado',
              'value' => 'bitacora_stock($data->id_item_solicitud,$data->id_medicamento)',
            ),
             array(
                'name'=>'estado',
                'value'=>'strtr($data->estado, array("0" => "Pendiente","1" => "Aprobado","2" => "Rechazado"))',
            ),
      ),
    ));  ?> 
     <h3 align="center">Solicitud Procesada</h3>

     <?php 

    //    $model = ItemSolicitud::model()->findByPk($id_item_solicitud);
        //modelo de tipo solicitud dnd tengo los datos necesarios para asignar excepto la estacion
        $modelSolicitud = Solicitudes::model()->findByAttributes(array('id_solicitud'=>$model->id_solicitud)); 
        //obtengo la estacion de quien me hizo la solicitud y a donde voy a asignar por medio de la guardia.
        $estacion = Guardias::model()->findByPk($modelSolicitud->guardias_id_guardia)->id_estacion;

        print_r($estacion);
  }

function cantidadExistente($estacion, $id_medicamento) {
	$sql = "SELECT cantidad FROM stock WHERE id_estacion=".$estacion." AND id_medicamento=".$id_medicamento;
	$value = Stock::model()->findBySql($sql);

    if (!isset($value->cantidad)) {
    	return 0;
    } else {
    	return $value->cantidad;
    }
}

function miStock($estacion, $id_medicamento){
	$sql = "SELECT cantidad FROM stock WHERE id_estacion=".$estacion." AND id_medicamento=".$id_medicamento;
	$value = Stock::model()->findBySql($sql);

    if (!isset($value->cantidad)) {
    	return 0;
    } else {
    	return $value->cantidad;
    }	

}

function bitacora_stock($item, $id_medicamento){
  $sql = "SELECT cantidad FROM bitacora_stock WHERE id_item_solicitud=".$item." AND id_medicamento=".$id_medicamento;
  $value = Stock::model()->findBySql($sql);

    if (!isset($value->cantidad)) {
      return 0;
    } else {
      return $value->cantidad;
    } 

}

?>
