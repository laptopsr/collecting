<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile")=>array('profile'),
	UserModule::t("Edit"),
);
/*
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Hallitse käyttäjiä'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('Listaa käyttäjät'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Profiili'), 'url'=>array('/user/profile')),
    array('label'=>UserModule::t('Vaihda salasana'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Kirjaudu ulos'), 'url'=>array('/user/logout')),
);
*/
?><h1><?php echo UserModule::t('Muokkaa profiilia'); ?></h1>


<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>

  
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('Tähdellä<span class="required">*</span> merkityt kentät ovat pakollisia.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {

echo '<div class="row form">';

echo '
<div class="row">
 <div class="col-sm-4">
  <div class="panel panel-info">
   <div class="panel-heading">Yhteystiedot</div>
   <div class="panel-body">';

		 foreach($profileFields as $field) 
		 {
		 if(
			$field->varname == 'lastname'
			or $field->varname == 'firstname'
		 ){
		    echo '<div class="row" id="My_'.$field->varname.'">';
			lomake($profile,$field,$form);
		    echo '</div>';
		 }

		 }
echo '
   </div>
  </div>
 </div>
</div>
';

echo '</div>'; //form
		}


function lomake($profile,$field,$form){

		/* lomake */
		echo $form->labelEx($profile,$field->varname);
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range),
				array(
					//'empty'=>'Valitse',
					'class'=>'form-control'
			 	));
		} elseif ($field->field_type=="TEXT") {
			echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50,'class'=>'form-control input-sm'));
		} elseif ($field->field_type=="FLOAT") {
			echo $form->numberField($profile,$field->varname,array('class'=>'form-control input-sm', 'step'=>'0.01'));
		} elseif ($field->varname=="ppkkvvvv") {
			echo $form->dateField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'class'=>'form-control input-sm'));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'class'=>'form-control input-sm'));
		}
		echo $form->error($profile,$field->varname); 
		/* lomake */
}
?>

<div class="row form">
<div class="col-sm-4">
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::link('Vaihda salasana','changepassword',array('class'=>'btn btn-primary btn-block')) ?>
	<br>
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Luo') : UserModule::t('Tallenna'),array('class'=>'btn btn-primary btn-block')); ?>
	</div>

<?php $this->endWidget(); ?>
 </div>
</div><!-- form -->













