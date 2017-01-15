<?php
/* @var $this FlightsController */
/* @var $model Flights */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'flights-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flight_no'); ?>
		<?php echo $form->textField($model,'flight_no',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'flight_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destination'); ?>
		<?php echo $form->textField($model,'destination',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'destination'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'collector_id'); ?>
		<?php echo $form->textField($model,'collector_id'); ?>
		<?php echo $form->error($model,'collector_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'collecting_start'); ?>
		<?php echo $form->textField($model,'collecting_start',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'collecting_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'collecting_end'); ?>
		<?php echo $form->textField($model,'collecting_end',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'collecting_end'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
