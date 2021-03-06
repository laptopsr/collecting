<div class="form row">
 <div class="col-sm-4">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

	<p class="note"><?php echo UserModule::t('Tähdellä<span class="required">*</span> merkityt kentät ovat pakollisia.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

<!--pekan muutos-->
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {

			if($field->varname == 'tyyppi')
			{
				echo $form->hiddenField($profile,$field->varname,array('value'=>2,'size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255), 'class'=>'form-control'));
				break;
			} elseif($field->varname == 'superuser') {
				echo $form->textField($profile,$field->varname,array('value'=>0,'size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255), 'class'=>'form-control'));
				break;
			}

			?>
	<div class="">
		<?php echo $form->labelEx($profile,$field->varname); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range), array('class'=>'form-control'));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('s'=>6, 'cols'=>50, 'class'=>'form-control'));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255), 'class'=>'form-control'));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>
			<?php
			}
		}
?>
<!--pekan muutos-->

	<div class="">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'superuser'); ?>
		<?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'superuser'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<br>
	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tallenna' : 'Tallenna', array('class'=>'submit btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>
 </div>
</div><!-- form -->
