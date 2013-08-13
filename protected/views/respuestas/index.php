<?php
$this->breadcrumbs=array(
	'Respuesta Actividads',
);

$this->menu=array(
	array('label'=>'Agregar RespuestaActividad', 'url'=>array('create')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Respuesta Actividads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
