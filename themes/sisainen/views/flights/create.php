<?php
/* @var $this FlightsController */
/* @var $model Flights */

$this->breadcrumbs=array(
	'Flights'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List Flights', 'url'=>array('index')),
	array('label'=>'Manage Flights', 'url'=>array('admin')),
);*/
?>

<h1>Create Fligherrfets</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
