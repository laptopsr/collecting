<?php
/* @var $this FlightsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Flights',
);

$this->menu=array(
	array('label'=>'Create Flights', 'url'=>array('create')),
	array('label'=>'Manage Flights', 'url'=>array('admin')),
);
?>

<h1>Flights</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
