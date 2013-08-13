<?php
$this->breadcrumbs=array(
	'Actividads'=>array('index'),
	$model->idActividad,
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Agregar Actividad', 'url'=>array('create')),
	array('label'=>'Actualizar ', 'url'=>array('update', 'id'=>$model->idActividad)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idActividad),'confirm'=>'¿Está seguro(a) de eliminar este elemento?')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>View Actividad #<?php echo $model->idActividad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idActividad',
		'fechaActivacion',
		'descripcion',
		'mediaHome',
		'mediaTypeHome',
		'mediaInterior',
		'mediaTypeInterior',
		'preventiva',
		'teaser',
	),
)); ?>
