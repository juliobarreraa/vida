<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empleado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> = requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idEmpleado'); ?>
		<?php echo $form->textField($model,'idEmpleado',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'idEmpleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sucursal'); ?>
		<?php echo $form->textField($model,'sucursal',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sucursal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departamento'); ?>
		<?php echo $form->textField($model,'departamento',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'departamento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region'); ?>
		<?php echo $form->textField($model,'region',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registrado'); ?>
		<?php echo $form->textField($model,'registrado'); ?>
		<?php echo $form->error($model,'registrado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaRegistro'); ?>
		<?php echo $form->textField($model,'fechaRegistro'); ?>
		<?php echo $form->error($model,'fechaRegistro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipRegistro'); ?>
		<?php echo $form->textField($model,'ipRegistro',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'ipRegistro'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->