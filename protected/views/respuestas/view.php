<?php
$this->breadcrumbs=array(
	'Respuesta Actividads'=>array('index'),
	$model->idRespuesta,
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Ver Respuesta</h1>

<div class="view">
	<h2><?php echo $model->votos;?> votos</h2>

	<b><?php echo CHtml::encode($model->getAttributeLabel('idRespuesta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($model->idRespuesta), array('view', 'id'=>$model->idRespuesta)); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('idActividad')); ?>:</b>
	<?php echo Yii::app()->dateFormatter->formatDateTime($model->actividad->fechaActivacion,"long",null); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($model->empleado->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('fechaIngreso')); ?>:</b>
	<?php echo CHtml::encode($model->fechaIngreso); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('fechaRespuesta')); ?>:</b>
	<?php echo CHtml::encode($model->fechaRespuesta); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('respuesta')); ?>:</b><br />
	<?php echo $model->respuesta; ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('media')); ?>:</b><br /><br />
	<?php echo CHtml::image($this->createUrl('/respuestas/viewImage/',array('id'=>$model->idRespuesta)),''); ?>
	<br /><br />

	<?php /*
	<b><?php echo CHtml::encode($model->getAttributeLabel('respuestaResaltada')); ?>:</b>
	<?php echo CHtml::encode($model->respuestaResaltada); ?>
	<br />

	*/ ?>

</div>