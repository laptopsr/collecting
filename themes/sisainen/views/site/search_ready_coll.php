<?php

?>


<div class="row">
 <div class="col-sm-12">
                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
			 <center>
                            <h1>
                                ETSI KERÄILYN TIEDT ANTAMALLA VIIVAKOODI
                            </h1>
			 </center>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
 </div>
</div>

<?php if( isset($model->id) ): ?>
<br>
<div class="portlet portlet-default">
  <div class="portlet-heading">
      <div class="portlet-title">
         <h4><?php echo $model->flight_no; ?></h4>
      </div>
    <div class="clearfix"></div>
  </div>
  <div class="portlet-body">
   <div class="table-responsive">

	<table class="table">
	<tr><td><?php echo Flights::model()->getAttributeLabel('flight_no'); ?></td><td><?php echo $model->flight_no; ?></td></tr>
	<tr><td><?php echo Flights::model()->getAttributeLabel('destination'); ?></td><td><?php echo $model->destination; ?></td></tr>
	<tr><td><?php echo Flights::model()->getAttributeLabel('date'); ?></td><td><?php echo $model->date; ?></td></tr>
	</table>

	<?php
		$criteria = new CDbCriteria;
		$criteria->condition = " flight_no_id='".$model->id."' ";
		$cr = CollectorRows::model()->findAll($criteria);
	?>

	<?php if( count($cr) > 0 ): ?>
	<table class="table">
	<thead>
	<tr>
	<th><?php echo CollectorRows::model()->getAttributeLabel('product_name'); ?></th>
	<th><?php echo CollectorRows::model()->getAttributeLabel('description'); ?></th>
	<th><?php echo CollectorRows::model()->getAttributeLabel('quantity'); ?></th>
	<th><?php echo CollectorRows::model()->getAttributeLabel('unit'); ?></th>
	<th><?php echo CollectorRows::model()->getAttributeLabel('stowage'); ?></th>
	<th><?php echo CollectorRows::model()->getAttributeLabel('group_no'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($cr as $data): ?>
	<tr>
	<td><?php echo $data->product_name; ?></td>
	<td><?php echo $data->description; ?></td>
	<td><?php echo $data->quantity; ?></td>
	<td><?php echo $data->unit; ?></td>
	<td><?php echo $data->stowage; ?></td>
	<td><?php echo $data->group_no; ?></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<?php endif; ?>

   </div>
  </div>
</div>
<!-- /.portlet -->
<?php endif; ?>

<br>

<div class="row">
 <div class="col-sm-6 col-sm-offset-3">

	<form action="#" method="POST">
	    <div class="input-group">
	      <input type="text" class="form-control input-lg" name="barcode" placeholder="Kirjoita tai skannaa viivakoodi tähän" autofocus value="<?php if(!empty($barcode)) echo $barcode; ?>">
	      <span class="input-group-btn">
	        <button type="submit" class="btn btn-default btn-lg checkBarCode" type="button">OK</button>
	      </span>
	    </div>
	</form>

 </div>
</div>

<br>

<div class="row">
 <div class="col-sm-6 col-sm-offset-3">
  <?php echo CHtml::link('Takaisin', Yii::app()->request->baseUrl.'/index.php/site/index', array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
