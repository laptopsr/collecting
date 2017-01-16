<?php

?>

<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
			 <center>
                            <h1>
                                KERÄILY <?php if(isset($model->flight_no)) echo $model->flight_no; ?> VALMIS.<br> ANNA KOHDEOSOITE LUKEMALLA KOHTEEN VIIVAKOODI.
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
  <button class="btn btn-lg btn-default btn-block" data-toggle="collapse" data-target="#syotaItse"> Syötä viivakoodi itse <i class="caret"></i></button>
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
  <?php echo CHtml::link('Takaisin', Yii::app()->request->baseUrl.'/index.php/site/collecting_product_quantity?id='.$row_id, array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
<br>
<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
  <button class="btn btn-lg btn-default btn-block" data-toggle="collapse" data-target="#Keskeyta"> Keskeytä <i class="caret"></i></button>
  <div class="collapse" id="Keskeyta">
  <p>
	<form id="keskeytaLomake" action="<?php echo Yii::app()->request->baseUrl.'/index.php/site/keskeyta'; ?>" method="POST">
	      <input type="hidden" class="form-control" name="flight_id" value="<?php echo $model->id; ?>">
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


});
</script>



<script>
$(document).ready(function(){

 $('#barcode').keypress(function(e){
    	if(e.which == 13) {
		suoritaBarcode();
    	}
 });

 $('.checkBarCode').click(function(){
	suoritaBarcode();
 });

 function suoritaBarcode()
 {

        $.ajax({
           url: 'insert_barcode_kohde_osoite?id='+ $('#this_id').val(),
           type: "POST",
           data: { barcode : $('#barcode').val() },
           success: function(data){
		data = JSON.parse(data);
		//console.log(data);
		if(data['OK'])
		{
			window.location.href="collecting";
		} 

           }
        });

 }

});
</script>


