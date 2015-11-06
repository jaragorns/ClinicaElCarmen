<?php
/* @var $this VacacionesController */
/* @var $model Vacaciones */

$this->breadcrumbs=array(
	'Vacaciones'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Vacaciones', 'url'=>array('index')),
	array('label'=>'Crear Vacaciones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vacaciones-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Vacaciones</h1>


<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vacaciones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name' => 'id_usuario',
            'value' => 'Usuarios::model()->findByAttributes(array("id"=>$data->id_usuario))->NombreCompleto', 
        ),
		array(
            'name' => 'fecha_inicio',
            'value' => 'date_format(date_create($data->fecha_inicio), "d-m-Y")'
        ),
		array(
            'name' => 'fecha_fin',
            'value' => 'date_format(date_create($data->fecha_fin), "d-m-Y")'
        ),
		 array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
        ),
	),
)); ?>
