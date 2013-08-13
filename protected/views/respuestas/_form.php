<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'respuesta-actividad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> = requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idActividad'); ?>
		<?php echo $form->textField($model,'idActividad',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idActividad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idUsuario'); ?>
		<?php echo $form->textField($model,'idUsuario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaIngreso'); ?>
		<?php echo $form->textField($model,'fechaIngreso'); ?>
		<?php echo $form->error($model,'fechaIngreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaRespuesta'); ?>
		<?php echo $form->textField($model,'fechaRespuesta'); ?>
		<?php echo $form->error($model,'fechaRespuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'respuesta'); ?>
		<?php echo $form->textArea($model,'respuesta',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'respuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media'); ?>
		<?php echo $form->textField($model,'media',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'media'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'respuestaResaltada'); ?>
		<?php echo $form->textField($model,'respuestaResaltada'); ?>
		<?php echo $form->error($model,'respuestaResaltada'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->