<?php
/* @var $this ProductsController */
/* @var $model Products */
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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	<div class="">
		<?php echo $form->label($model,'barcode'); ?>
		<?php echo $form->textField($model,'barcode',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
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
