<?php
/* @var $this CollectorRowsController */
/* @var $model CollectorRows */

$this->breadcrumbs=array(
	'Collector Rows'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CollectorRows', 'url'=>array('index')),
	array('label'=>'Create CollectorRows', 'url'=>array('create')),
	array('label'=>'Update CollectorRows', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CollectorRows', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CollectorRows', 'url'=>array('admin')),
);
?>

<h1>View CollectorRows #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'time',
		'flight_no',
		'date',
		'status',
		'product_name',
		'quantity',
		'barcode',
	),
)); ?>
