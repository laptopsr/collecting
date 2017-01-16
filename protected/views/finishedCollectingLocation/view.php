<?php
/* @var $this FinishedCollectingLocationController */
/* @var $model FinishedCollectingLocation */

$this->breadcrumbs=array(
	'Finished Collecting Locations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FinishedCollectingLocation', 'url'=>array('index')),
	array('label'=>'Create FinishedCollectingLocation', 'url'=>array('create')),
	array('label'=>'Update FinishedCollectingLocation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FinishedCollectingLocation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FinishedCollectingLocation', 'url'=>array('admin')),
);
?>

<h1>View FinishedCollectingLocation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'time',
		'location_name',
		'barcode',
	),
)); ?>
