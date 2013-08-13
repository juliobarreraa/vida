<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idActividad'); ?>
		<?php echo $form->textField($model,'idActividad',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaActivacion'); ?>
		<?php echo $form->textField($model,'fechaActivacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mediaHome'); ?>
		<?php echo $form->textArea($model,'mediaHome',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mediaTypeHome'); ?>
		<?php echo $form->textField($model,'mediaTypeHome',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mediaInterior'); ?>
		<?php echo $form->textArea($model,'mediaInterior',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mediaTypeInterior'); ?>
		<?php echo $form->textField($model,'mediaTypeInterior',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preventiva'); ?>
		<?php echo $form->textField($model,'preventiva'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'teaser'); ?>
		<?php echo $form->textField($model,'teaser'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->