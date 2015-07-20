<?php
/* @var $this TurnosController */
/* @var $model Turnos */

$this->breadcrumbs=array(
	'Turnos'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Turnos', 'url'=>array('index')),
	array('label'=>'Crear Turno', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#turnos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Turnos</h1>

<p>
Tambi&eacute;n puede escribir un operador de comparaci&oacute;n  (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
&oacute; <b>=</b>) en el comienzo de cada uno de los valores de b&uacute;squeda para especificar c&oacute;mo se debe hacer la comparaci&oacute;n.
</p>

<?php echo CHtml::link('B&uacute;squeda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'turnos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_turno',
		'descripcion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
