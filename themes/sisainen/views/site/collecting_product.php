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
  <?php echo CHtml::link('Lue viivakoodi', Yii::app()->request->baseUrl.'/index.php/site/index', array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
<br>
<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
  <button class="btn btn-lg btn-default btn-block" data-toggle="collapse" data-target="#syotaItse"> Syötä itse <i class="caret"></i></button>
  <div class="collapse" id="syotaItse">
  <p>
	<form action="#" method="POST">
	    <div class="input-group">
	      <input type="hidden" class="form-control" id="this_id" value="<?php echo $model->id; ?>">
	      <input type="text" class="form-control" id="barcode" placeholder="Kirjoita viivakoodi tähän">
	      <span class="input-group-btn">
	        <button class="btn btn-default checkBarCode" type="button">OK</button>
	      </span>
	    </div>
	</form>
  </p>
  </div>
 </div>
</div>

<br>

<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
  <?php echo CHtml::link('Takaisin', Yii::app()->request->baseUrl.'/index.php/site/collecting', array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
<br>
<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
  <?php echo CHtml::link('Keskeytä', Yii::app()->request->baseUrl.'/index.php/site/keskeyta_rows?id='.$model->id, array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
</div>



<script>
$(document).ready(function(){

 $('.checkBarCode').click(function(){

        $.ajax({
           url: 'check_barcode?id='+ $('#this_id').val(),
           type: "POST",
           data: { barcode : $('#barcode').val() },
           success: function(data){
		data = JSON.parse(data);
		console.log(data);
		if(data['OK'])
		{
			window.location.href="collecting_product_quantity?id=" + $('#this_id').val();
		} 
		if(data['ERROR'])
		{
			alert(data['ERROR']+ ' väärä viivakoodi');
		} 

           }
        });
 });

});
</script>


