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
if(Yii::app()->user==NULL){ 
	if(Yii::app()->user->role=="Superadmin"){ ?>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php } 
}?>
<dd>Nos complace brindar para usted y para su mayor comodidad nuestro directorio médico, en donde puede visualizar los días de 
	consultas. Si desea mayor información comuníquese con nosotros a cualquiera de nuestros números telefónicos. 
</br></br>Clínica El Carmen C.A. eficiencia y calidad a la población de la zona norte del Estado Táchira.</dd>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'medicos-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
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
	),
)); ?>
