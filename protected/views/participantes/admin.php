<?php
$this->breadcrumbs=array(
	'Empleados'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Agregar Empleado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('empleado-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrando Empleados</h1>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'empleado-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idEmpleado',
		'nombre',
		'sucursal',
		'departamento',
		'region',
		array(
			'name'=>'registrado',
			'value'=>'$data->registrado==1?"Si":"No"'
			),
		/*
		'fechaRegistro',
		'ipRegistro',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
