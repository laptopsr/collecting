<?php
/* @var $this CollectorRowsController */
/* @var $model CollectorRows */
/* @var $form CActiveForm */
?>

<div class="row form">
 <div class="col-sm-4">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'status-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Tähdellä <span class="required">*</span> merkityt kentät ovat pakollisia.</p>

	<?php echo $form->errorSummary($model); ?>



	<div class="">
		<?php echo $form->labelEx($model,'flight_no_id'); ?>
		<?php echo $form->textField($model,'flight_no_id',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'flight_no_id'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'product_name'); ?>
		<?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'product_name'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'barcode'); ?>
		<?php echo $form->textField($model,'barcode',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'barcode'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'unit'); ?>
		<?php echo $form->textField($model,'unit',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'unit'); ?>
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
