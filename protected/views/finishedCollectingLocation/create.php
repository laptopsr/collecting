<?php
/* @var $this FinishedCollectingLocationController */
/* @var $model FinishedCollectingLocation */

$this->breadcrumbs=array(
	'Finished Collecting Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FinishedCollectingLocation', 'url'=>array('index')),
	array('label'=>'Manage FinishedCollectingLocation', 'url'=>array('admin')),
);
?>

<h1>Create FinishedCollectingLocation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>