<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="row form">
 <div class="col-sm-4">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Tähdellä <span class="required">*</span> merkityt kentät ovat pakollisia.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'barcode'); ?>
		<?php echo $form->textField($model,'barcode',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'barcode'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'stowage'); ?>
		<?php echo $form->textField($model,'stowage',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'stowage'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'group_no'); ?>
		<?php echo $form->textField($model,'group_no',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'group_no'); ?>
	</div>

	<br>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Valmis' : 'Tallenna', array('class' => 'btn btn-default btn-lg')); ?>
	</div>

<?php $this->endWidget(); ?>

 </div>
</div><!-- form -->
