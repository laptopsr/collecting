<?php
	if(!isset($model->id))
	{
		echo '<h1>Kaikki keräilyt on valmiina tai jo keräyksessä. Sinut siiretään etusivulle hetken kuluttua.</h1>';
		exit;
	}
?>

<div class="row">
 <div class="col-sm-4 col-sm-offset-3">
                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
			 <center>
                            <h1>
                                NIMIKE:  <?php echo $model->product_name; ?>
                            </h1>
                            <h3>
                                Selite:  <?php echo $model->description; ?>
				<br>
                                Säilytys:  <?php echo $model->stowage; ?>
				<br>
                                Ryhmä nro.:  <?php echo $model->group_no; ?>
				<br>
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
 <div class="col-sm-6 col-sm-offset-3">

	<form action="#" method="POST">
	    <div class="input-group">
	      <input type="hidden" class="form-control" id="this_id" value="<?php echo $model->id; ?>">
	      <input type="text" class="form-control input-lg" id="barcode" placeholder="Kirjoita tai skanna viivakoodi tähän" autofocus>
	      <span class="input-group-btn">
	        <button class="btn btn-lg btn-default checkBarCode" type="button">OK</button>
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
<br>

<div class="row">
 <div class="col-sm-6 col-sm-offset-3">
  <button class="btn btn-lg btn-default btn-block" data-toggle="collapse" data-target="#Keskeyta"> Keskeytä <i class="caret"></i></button>
  <div class="collapse" id="Keskeyta">
  <p>
	<form id="keskeytaLomake" action="<?php echo Yii::app()->request->baseUrl.'/index.php/site/keskeyta'; ?>" method="POST">
	      <input type="hidden" class="form-control" name="flight_id" value="<?php echo $flights_id; ?>">
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
			alert('Viivakoodi ei täsmää kerättävään tuotteeseen.');
				//data['ERROR']+ //toi oli alaertissa
		} 

           }
        });

 }

});
</script>


