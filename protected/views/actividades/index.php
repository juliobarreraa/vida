<?php
$this->breadcrumbs=array(
	'Actividads',
);

$this->menu=array(
	array('label'=>'Agregar Actividad', 'url'=>array('create')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Actividads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
