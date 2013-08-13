<?php
$this->breadcrumbs=array(
	'Empleados'=>array('index'),
	$model->idEmpleado=>array('view','id'=>$model->idEmpleado),
	'Update',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Agregar Empleado', 'url'=>array('create')),
	array('label'=>'Visualizar', 'url'=>array('view', 'id'=>$model->idEmpleado)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Actualizar Empleado <?php echo $model->idEmpleado; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>