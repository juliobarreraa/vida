<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'actividad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> = requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaActivacion'); ?>
		<?php echo $form->textField($model,'fechaActivacion'); ?>
		<?php echo $form->error($model,'fechaActivacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mediaHome'); ?>
		<?php echo $form->textArea($model,'mediaHome',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mediaHome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mediaTypeHome'); ?>
		<?php echo $form->textField($model,'mediaTypeHome',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'mediaTypeHome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mediaInterior'); ?>
		<?php echo $form->textArea($model,'mediaInterior',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mediaInterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mediaTypeInterior'); ?>
		<?php echo $form->textField($model,'mediaTypeInterior',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'mediaTypeInterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preventiva'); ?>
		<?php echo $form->textField($model,'preventiva'); ?>
		<?php echo $form->error($model,'preventiva'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teaser'); ?>
		<?php echo $form->textField($model,'teaser'); ?>
		<?php echo $form->error($model,'teaser'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->