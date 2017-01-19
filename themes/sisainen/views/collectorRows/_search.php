<?php
/* @var $this CollectorRowsController */
/* @var $model CollectorRows */
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

	<div class="">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time', array('class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'flight_no_id'); ?>
		<?php echo $form->textField($model,'flight_no_id',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status', array('class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'product_name'); ?>
		<?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity', array('class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'barcode'); ?>
		<?php echo $form->textField($model,'barcode',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'unit'); ?>
		<?php echo $form->textField($model,'unit',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'stowage'); ?>
		<?php echo $form->textField($model,'stowage',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'group_no'); ?>
		<?php echo $form->textField($model,'group_no',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>
	<br>
	<div class="buttons">
		<?php echo CHtml::submitButton('Hae', array('class'=>'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>
 </div>
</div><!-- search-form -->
