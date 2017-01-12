<?php
/* @var $this CollectorRowsController */
/* @var $model CollectorRows */

$this->breadcrumbs=array(
	'Collector Rows'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CollectorRows', 'url'=>array('index')),
	array('label'=>'Create CollectorRows', 'url'=>array('create')),
	array('label'=>'View CollectorRows', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CollectorRows', 'url'=>array('admin')),
);
?>

<h1>Update CollectorRows <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>