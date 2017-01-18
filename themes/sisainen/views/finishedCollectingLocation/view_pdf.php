<?php if(isset($_GET['pdf'])) : ?>
<br>


<div style="text-align:center">
 <?php echo $model->location_name; ?>


<p>
<?php
	$viivakoodi = $model->barcode;
	echo '<img src="'.Yii::app()->getBaseUrl(true) .'/barcode_generator/index.php?viivakoodi='.$viivakoodi.'">';
?>
</p>
</div>

<?php endif; ?>





