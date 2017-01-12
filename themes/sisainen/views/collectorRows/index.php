<?php
/* @var $this CollectorRowsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Collector Rows',
);

$this->menu=array(
	array('label'=>'Create CollectorRows', 'url'=>array('create')),
	array('label'=>'Manage CollectorRows', 'url'=>array('admin')),
);
?>

<h1>Collector Rows</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
