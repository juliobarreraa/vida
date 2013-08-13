<?php
$this->breadcrumbs=array(
	'Respuesta Actividads'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('respuesta-actividad-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrando Respuestas</h1>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'respuesta-actividad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'idActividad',
			'value'=>'Yii::app()->dateFormatter->formatDateTime($data->actividad->fechaActivacion,"long",null)'
		),
		array(
			'name'=>'idUsuario',
			'value'=>'$data->empleado->nombre'
		),
		array(
			'name'=>'idUsuarioRegion',
			'value'=>'$data->empleado->region'
		),
		array(
			'name'=>'votos',
			'value'=>'$data->votos'
		),
		'fechaIngreso',
		'fechaRespuesta',
		array(
			'name'=>'respuesta',
			'type'=>'raw'
		),
		/*
		'media',
		'respuestaResaltada',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}'
		),
	),
)); ?>
