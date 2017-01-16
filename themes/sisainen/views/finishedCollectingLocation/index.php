<?php
/* @var $this FinishedCollectingLocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Finished Collecting Locations',
);

$this->menu=array(
	array('label'=>'Create FinishedCollectingLocation', 'url'=>array('create')),
	array('label'=>'Manage FinishedCollectingLocation', 'url'=>array('admin')),
);
?>

<h1>Finished Collecting Locations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
