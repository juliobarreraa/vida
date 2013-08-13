<?php
$this->breadcrumbs=array(
	'Respuesta Actividads'=>array('index'),
	$model->idRespuesta=>array('view','id'=>$model->idRespuesta),
	'Update',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Agregar RespuestaActividad', 'url'=>array('create')),
	array('label'=>'Visualizar', 'url'=>array('view', 'id'=>$model->idRespuesta)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Actualizar RespuestaActividad <?php echo $model->idRespuesta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>