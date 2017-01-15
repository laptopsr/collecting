<?php
	if(!isset($model->id))
	{
		echo '<h1>Ei loyty rivea</h1>';
		exit;
	}
?>

<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
			 <center>
                            <h1>
                                NIMIKE:  <?php echo $model->product_name; ?>
                            </h1>
                            <h3>
                                MÄÄRÄ:  <?php echo $model->quantity; ?>
                            </h3>

			 </center>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
 </div>
</div>

<br>

<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
  <?php echo CHtml::link('OK', Yii::app()->request->baseUrl.'/index.php/site/index', array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
<br>
<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
  <?php echo CHtml::link('Takaisin', Yii::app()->request->baseUrl.'/index.php/site/collecting_product?id='.$model->flight_no_id, array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
<br>
<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
  <?php echo CHtml::link('Keskeytä', Yii::app()->request->baseUrl.'/index.php/site/keskeyta_rows?id='.$model->id, array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
</div>

