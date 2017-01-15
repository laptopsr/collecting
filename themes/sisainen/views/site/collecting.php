<?php
	if(!isset($lastRowModel->id))
	{
		echo '<h1>Ei loyty rivea</h1>';
		exit;
	}
?>

<div class="row">
 <div class="col-sm-3 col-sm-offset-4">
                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
			 <center>
                            <h1>
                                LENTO  <?php if(isset($lastRowModel->id)) echo $lastRowModel->flight_no; ?>
                            </h1>
				<h3><?php echo count($cr); ?> tuotetta</h3>
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
 <div class="col-sm-3 col-sm-offset-4">
  <?php echo CHtml::link('OK', Yii::app()->request->baseUrl.'/index.php/site/collecting_product?id='.$lastRowModel->id, array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>

<br>

<div class="row">
 <div class="col-sm-3 col-sm-offset-4">
  <?php echo CHtml::link('Takaisin', Yii::app()->request->baseUrl.'/index.php/site/index', array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
<br>
<div class="row">
 <div class="col-sm-3 col-sm-offset-4">
  <?php echo CHtml::link('Keskeytä', Yii::app()->request->baseUrl.'/index.php/site/keskeyta?id='.$lastRowModel->id, array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
</div>
