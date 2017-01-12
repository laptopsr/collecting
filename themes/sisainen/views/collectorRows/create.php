<?php
/* @var $this CollectorRowsController */
/* @var $model CollectorRows */

$this->breadcrumbs=array(
	'Collector Rows'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CollectorRows', 'url'=>array('index')),
	array('label'=>'Manage CollectorRows', 'url'=>array('admin')),
);
?>

<h1>Create CollectorRows</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>