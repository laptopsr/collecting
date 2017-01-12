<?php
/* @var $this StatusController */
/* @var $data Status */
?>


<tr>
	<td>
		<?php echo CHtml::link('<i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 110%"></i>', 
				array('update', 'id'=>$data->id), 
				array(
					'data-toggle'=>'tooltip', 
					'data-placement'=>'top', 
					'title'=>Yii::t('main', 'Muokkaa') 
				)
			); 
		?>
	</td>
	<td><?php echo $data->name; ?></td>
	<td><?php echo $data->user_creator_id; ?></td>
	<td><?php echo $data->time; ?></td>

</tr>
