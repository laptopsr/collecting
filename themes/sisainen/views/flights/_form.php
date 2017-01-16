<?php
/* @var $this FlightsController */
/* @var $model Flights */
/* @var $form CActiveForm */
?>

<div class="form row">
 <div class="col-sm-4">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'flights-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Tähdellä <span class="required">*</span> merkityt kentät ovat pakollisia.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php 
		$list = array(
			1=>'Avoin',
			3=>'Keskeytetty',
			4=>'Valmis',
		);
        	echo $form->dropDownList($model, 'status', $list,
		array('class'=>'form-control'));
		?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'flight_no'); ?>
		<?php echo $form->textField($model,'flight_no',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'flight_no'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'destination'); ?>
		<?php echo $form->textField($model,'destination',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'destination'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'collector_id'); ?>
		<?php echo $form->textField($model,'collector_id', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'collector_id'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'collecting_start'); ?>
		<?php echo $form->textField($model,'collecting_start',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'collecting_start'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'collecting_end'); ?>
		<?php echo $form->textField($model,'collecting_end',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'collecting_end'); ?>
	</div>

	<br>
	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tallenna' : 'Tallenna', array('class'=>'submit btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>
 </div>
</div><!-- form -->
