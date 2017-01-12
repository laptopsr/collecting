<?php
/* @var $this FlightsController */
/* @var $data Flights */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flight_no')); ?>:</b>
	<?php echo CHtml::encode($data->flight_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destination')); ?>:</b>
	<?php echo CHtml::encode($data->destination); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collector_id')); ?>:</b>
	<?php echo CHtml::encode($data->collector_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('collecting_start')); ?>:</b>
	<?php echo CHtml::encode($data->collecting_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collecting_end')); ?>:</b>
	<?php echo CHtml::encode($data->collecting_end); ?>
	<br />

	*/ ?>

</div>