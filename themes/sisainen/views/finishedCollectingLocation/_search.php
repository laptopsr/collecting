<?php
/* @var $this FinishedCollectingLocationController */
/* @var $model FinishedCollectingLocation */
/* @var $form CActiveForm */
?>

<div class="row form">
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
		<?php echo $form->label($model,'location_name'); ?>
		<?php echo $form->textField($model,'location_name',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'barcode'); ?>
		<?php echo $form->textArea($model,'barcode',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
	</div>
	<br>
	<div class="buttons">
		<?php echo CHtml::submitButton('Hae', array('class'=>'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>
 </div>
</div><!-- search-form -->
