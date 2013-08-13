<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idActividad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idActividad), array('view', 'id'=>$data->idActividad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaActivacion')); ?>:</b>
	<?php echo CHtml::encode($data->fechaActivacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mediaHome')); ?>:</b>
	<?php echo CHtml::encode($data->mediaHome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mediaTypeHome')); ?>:</b>
	<?php echo CHtml::encode($data->mediaTypeHome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mediaInterior')); ?>:</b>
	<?php echo CHtml::encode($data->mediaInterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mediaTypeInterior')); ?>:</b>
	<?php echo CHtml::encode($data->mediaTypeInterior); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('preventiva')); ?>:</b>
	<?php echo CHtml::encode($data->preventiva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teaser')); ?>:</b>
	<?php echo CHtml::encode($data->teaser); ?>
	<br />

	*/ ?>

</div>