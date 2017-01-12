<?php
/* @var $this FlightsController */
/* @var $model Flights */

$this->breadcrumbs=array(
	'Flights'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Flights', 'url'=>array('index')),
	array('label'=>'Create Flights', 'url'=>array('create')),
	array('label'=>'View Flights', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Flights', 'url'=>array('admin')),
);
?>

<h1>Update Flights <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>