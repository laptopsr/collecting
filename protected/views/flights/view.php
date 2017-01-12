<?php
/* @var $this FlightsController */
/* @var $model Flights */

$this->breadcrumbs=array(
	'Flights'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Flights', 'url'=>array('index')),
	array('label'=>'Create Flights', 'url'=>array('create')),
	array('label'=>'Update Flights', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Flights', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Flights', 'url'=>array('admin')),
);
?>

<h1>View Flights #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'time',
		'status',
		'flight_no',
		'destination',
		'date',
		'collector_id',
		'collecting_start',
		'collecting_end',
	),
)); ?>
