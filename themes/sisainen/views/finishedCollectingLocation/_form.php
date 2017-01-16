<?php
/* @var $this FinishedCollectingLocationController */
/* @var $model FinishedCollectingLocation */
/* @var $form CActiveForm */
?>

<div class="form row">
 <div class="col-sm-4">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finished-collecting-location-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Tähdellä <span class="required">*</span> merkityt kentät ovat pakollisia.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="">
		<?php echo $form->labelEx($model,'location_name'); ?>
		<?php echo $form->textField($model,'location_name',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'location_name'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'barcode'); ?>
		<?php echo $form->textArea($model,'barcode',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'barcode'); ?>
	</div>

	<br>
	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tallenna' : 'Tallenna', array('class'=>'submit btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
