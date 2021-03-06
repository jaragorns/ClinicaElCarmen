<?php
/* @var $this MedicosController */
/* @var $model Medicos */

$this->breadcrumbs=array(
	'Directorio Médico',
);

if(Yii::app()->user==NULL){
	if(Yii::app()->user->role=="Superadmin"){
		$this->menu=array(
			array('label'=>'Listar Médicos', 'url'=>array('index')),
			array('label'=>'Crear Médico', 'url'=>array('create')),
		);
	}
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#medicos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<dt><h1 class="center-title" style="text-align:center;">Directorio Médico</h1></dt>
<?php 
if(Yii::app()->user->role=="Superadmin"){ ?>

<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ó <b>=</b>)  en el comienzo de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php  }?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'medicos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_medico',
		'nombre_completo',
		array(
            'name'  => 'cedula',
            'htmlOptions' => array('style' => 'text-align: center;'),
        ),
		'especialidad',
		array(
            'name'  => 'rif',
            'htmlOptions' => array('style' => 'text-align: center;'),
        ),
		'consulta',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
