<?php
/* @var $this FinishedCollectingLocationController */
/* @var $model FinishedCollectingLocation */

$this->breadcrumbs=array(
	'Finished Collecting Locations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FinishedCollectingLocation', 'url'=>array('index')),
	array('label'=>'Create FinishedCollectingLocation', 'url'=>array('create')),
	array('label'=>'View FinishedCollectingLocation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FinishedCollectingLocation', 'url'=>array('admin')),
);
?>

<h1>Update FinishedCollectingLocation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>