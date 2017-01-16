<?php
/* @var $this ProductsController */
/* @var $data Products */
?>

<tr>
	<td>
		<?php echo CHtml::link('<i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 110%"></i>', 
				array('view', 'id'=>$data->id), 
				array(
					'data-toggle'=>'tooltip', 
					'data-placement'=>'top', 
					'title'=>Yii::t('main', 'Lisätiedot') 
				)
			); 
		?>
	</td>
	<td><?php echo $data->id; ?></td>
	<td><?php echo $data->name; ?></td>
	<td><?php echo $data->barcode; ?></td>

</tr>
