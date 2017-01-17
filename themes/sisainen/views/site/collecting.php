<?php
	if(!isset($lastRowModel->id))
	{
		$this->redirect('collecting_all_done');
		exit;
	}
?>

<!--<p><div id="countTimer"></div></p>-->

<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
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
 <div class="col-sm-4 col-sm-offset-4">
  <?php echo CHtml::link('OK', Yii::app()->request->baseUrl.'/index.php/site/collecting_product?id='.$lastRowModel->id, array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>

<br>

<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
  <?php echo CHtml::link('Takaisin', Yii::app()->request->baseUrl.'/index.php/site/index', array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
<br>
<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
  <button class="btn btn-lg btn-default btn-block" data-toggle="collapse" data-target="#Keskeyta"> Keskeytä <i class="caret"></i></button>
  <div class="collapse" id="Keskeyta">
  <p>
	<form id="keskeytaLomake" action="<?php echo Yii::app()->request->baseUrl.'/index.php/site/keskeyta'; ?>" method="POST">
	      <input type="hidden" class="form-control" name="flight_id" value="<?php echo $lastRowModel->id; ?>">
	      <textarea class="form-control" name="keskeytys_syy" id="keskeytys_syy" placeholder="Kirjoita syy tähän"></textarea>
	      <br>
	      <button type="submit" class="btn btn-default btn-block" type="button">Hyväksy keskeytys</button>
	</form>
  </p>
 </div>
</div>
</div>



<script>
$(document).ready(function(){


 $('#keskeytaLomake').on('submit', function(e){

	if( $('#keskeytys_syy').val() === '' )
	{
		$('#keskeytys_syy').css({"border":"2px red solid"});
		return false;
	}
 });




var step = 2; // 21 on 5 minuttia
var count = step;
minuttinLaskuri();
function minuttinLaskuri()
{
		count += -1;
		var time = count*15;
		var minutes = "0" + Math.floor(time / 60);
		var seconds = "0" + (time - minutes * 60);
		jaljella =  minutes.substr(-2) + ":" + seconds.substr(-2);
		$('#countTimer').text('Aikajäljellä: '+jaljella);
		if(count < 1)
		window.location.href="index"
}
setInterval(minuttinLaskuri, "15000");



});
</script>
