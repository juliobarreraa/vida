<?php
$this->breadcrumbs=array(
	'Empleados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Agregar Empleado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>