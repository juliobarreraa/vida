<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRespuesta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRespuesta), array('view', 'id'=>$data->idRespuesta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idActividad')); ?>:</b>
	<?php echo CHtml::encode($data->idActividad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaIngreso')); ?>:</b>
	<?php echo CHtml::encode($data->fechaIngreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaRespuesta')); ?>:</b>
	<?php echo CHtml::encode($data->fechaRespuesta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('respuesta')); ?>:</b>
	<?php echo $data->respuesta; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media')); ?>:</b>
	<?php echo CHtml::encode($data->media); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('respuestaResaltada')); ?>:</b>
	<?php echo CHtml::encode($data->respuestaResaltada); ?>
	<br />

	*/ ?>

</div>