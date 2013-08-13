<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEmpleado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEmpleado), array('view', 'id'=>$data->idEmpleado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sucursal')); ?>:</b>
	<?php echo CHtml::encode($data->sucursal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departamento')); ?>:</b>
	<?php echo CHtml::encode($data->departamento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region')); ?>:</b>
	<?php echo CHtml::encode($data->region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registrado')); ?>:</b>
	<?php echo CHtml::encode($data->registrado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaRegistro')); ?>:</b>
	<?php echo CHtml::encode($data->fechaRegistro); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ipRegistro')); ?>:</b>
	<?php echo CHtml::encode($data->ipRegistro); ?>
	<br />

	*/ ?>

</div>