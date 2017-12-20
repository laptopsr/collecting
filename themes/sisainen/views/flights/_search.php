<?php
/* @var $this FlightsController */
/* @var $model Flights */
/* @var $form CActiveForm */
?>

<div class="wide form">
 <div class="col-sm-4">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id', array('class'=>'form-control')); ?>
	</div>

<!--	
	<div class="">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time', array('class'=>'form-control')); ?>
	</div>
-->
	<div class="">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status', array('class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'flight_no'); ?>
		<?php echo $form->textField($model,'flight_no',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'destination'); ?>
		<?php echo $form->textField($model,'destination',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'collector_id'); ?>
		<?php echo $form->textField($model,'collector_id', array('class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'collecting_start'); ?>
		<?php echo $form->textField($model,'collecting_start',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'collecting_end'); ?>
		<?php echo $form->textField($model,'collecting_end',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
	</div>

	<br>
	<div class="buttons">
		<?php echo CHtml::submitButton('Hae', array('class'=>'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>
 </div>
</div><!-- search-form -->
