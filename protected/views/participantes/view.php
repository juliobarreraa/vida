<?php
$this->breadcrumbs=array(
	'Empleados'=>array('index'),
	$model->idEmpleado,
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Agregar Empleado', 'url'=>array('create')),
	array('label'=>'Actualizar ', 'url'=>array('update', 'id'=>$model->idEmpleado)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEmpleado),'confirm'=>'¿Está seguro(a) de eliminar este elemento?')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>View Empleado #<?php echo $model->idEmpleado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEmpleado',
		'nombre',
		'sucursal',
		'departamento',
		'region',
		'registrado',
		'fechaRegistro',
		'ipRegistro',
	),
)); ?>
