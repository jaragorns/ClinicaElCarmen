<?php
/* @var $this GuardiasController */
/* @var $model Guardias */

$this->breadcrumbs=array(
	'Guardias'=>array('admin'),
	
);

$this->menu=array(
	array('label'=>'Crear Guardia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#guardias-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Guardias</h1>

<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ó <b>=</b>)  en el comienzo de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'guardias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'mes',
		'ano',
		array(
            'name' => 'id_usuario',
            'value' => 'Usuarios::model()->findByAttributes(array("id"=>$data->id_usuario))->NombreCompleto'
        ),
		array(
            'name' => 'id_estacion',
            'value' => 'Estaciones::model()->findByAttributes(array("id_estacion"=>$data->id_estacion))->nombre'
        ),
		array(
            'name' => 'dia_1',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_1))->abreviatura'
        ),
		array(
            'name' => 'dia_2',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_2))->abreviatura'
        ),
		array(
            'name' => 'dia_3',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_3))->abreviatura'
        ),
		array(
            'name' => 'dia_4',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_4))->abreviatura'
        ),
		array(
            'name' => 'dia_5',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_5))->abreviatura'
        ),
		array(
            'name' => 'dia_6',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_6))->abreviatura'
        ),
		array(
            'name' => 'dia_7',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_7))->abreviatura'
        ),
		array(
            'name' => 'dia_8',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_8))->abreviatura'
        ),
		array(
            'name' => 'dia_9',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_9))->abreviatura'
        ),
		array(
            'name' => 'dia_10',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_10))->abreviatura'
        ),
		array(
            'name' => 'dia_11',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_11))->abreviatura'
        ),
		array(
            'name' => 'dia_12',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_12))->abreviatura'
        ),
		array(
            'name' => 'dia_13',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_13))->abreviatura'
        ),
		array(
            'name' => 'dia_14',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_14))->abreviatura'
        ),
		array(
            'name' => 'dia_15',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_15))->abreviatura'
        ),
		array(
            'name' => 'dia_16',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_16))->abreviatura'
        ),
		array(
            'name' => 'dia_17',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_17))->abreviatura'
        ),
		array(
            'name' => 'dia_18',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_18))->abreviatura'
        ),
		array(
            'name' => 'dia_19',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_19))->abreviatura'
        ),
		array(
            'name' => 'dia_20',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_20))->abreviatura'
        ),
		array(
            'name' => 'dia_21',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_21))->abreviatura'
        ),
		array(
            'name' => 'dia_22',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_22))->abreviatura'
        ),
		array(
            'name' => 'dia_23',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_23))->abreviatura'
        ),
		array(
            'name' => 'dia_24',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_24))->abreviatura'
        ),
		array(
            'name' => 'dia_25',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_25))->abreviatura'
        ),
		array(
            'name' => 'dia_26',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_26))->abreviatura'
        ),
		array(
            'name' => 'dia_27',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_27))->abreviatura'
        ),
		array(
            'name' => 'dia_28',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_28))->abreviatura'
        ),
		array(
            'name' => 'dia_29',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_29))->abreviatura'
        ),
		array(
            'name' => 'dia_30',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_30))->abreviatura'
        ),
		array(
            'name' => 'dia_31',
            'value' => 'Turnos::model()->findByAttributes(array("id_turno"=>$data->dia_31))->abreviatura'
        ),
		array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
        ),
	),
)); ?>
