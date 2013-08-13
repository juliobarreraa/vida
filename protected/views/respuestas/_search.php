<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idRespuesta'); ?>
		<?php echo $form->textField($model,'idRespuesta',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idActividad'); ?>
		<?php echo $form->textField($model,'idActividad',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaIngreso'); ?>
		<?php echo $form->textField($model,'fechaIngreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaRespuesta'); ?>
		<?php echo $form->textField($model,'fechaRespuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'respuesta'); ?>
		<?php echo $form->textArea($model,'respuesta',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'media'); ?>
		<?php echo $form->textField($model,'media',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'respuestaResaltada'); ?>
		<?php echo $form->textField($model,'respuestaResaltada'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->