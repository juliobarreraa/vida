<?php
$this->breadcrumbs=array(
	'Actividads'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Agregar Actividad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('actividad-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrando Actividads</h1>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'actividad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idActividad',
		'fechaActivacion',
		'descripcion',
		'mediaHome',
		'mediaTypeHome',
		'mediaInterior',
		/*
		'mediaTypeInterior',
		'preventiva',
		'teaser',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
