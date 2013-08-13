<?php
$this->breadcrumbs=array(
	'Actividads'=>array('index'),
	$model->idActividad=>array('view','id'=>$model->idActividad),
	'Update',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Agregar Actividad', 'url'=>array('create')),
	array('label'=>'Visualizar', 'url'=>array('view', 'id'=>$model->idActividad)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Actualizar Actividad <?php echo $model->idActividad; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>