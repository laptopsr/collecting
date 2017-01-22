<?php
	if(!isset($model->id))
	{
		echo '<h1>Kaikki keräilyt on valmiina tai jo keräyksessä. Sinut siiretään etusivulle hetken kuluttua.</h1>';
		exit;
	}
?>

<div class="row">
 <div class="col-sm-6 col-sm-offset-3">
                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
			 <center>
                            <h1>
                                NIMIKE:  <?php echo $model->product_name; ?>
                            </h1>
                            <h3>
                                MÄÄRÄ:  <?php echo $model->quantity; ?>&nbsp; <?php echo $model->unit; ?>
				<br>
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
  <?php echo CHtml::link('OK', Yii::app()->request->baseUrl.'/index.php/site/collecting_product_for_next?row_id='.$model->id.'&flights_id='.$model->flight_no_id, array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
<br>

<?php if($takaisin) : ?>
<div class="row">
 <div class="col-sm-6 col-sm-offset-3">
  <?php echo CHtml::link('Takaisin', Yii::app()->request->baseUrl.'/index.php/site/collecting_product?id='.$model->flight_no_id, array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>
<br>
<?php endif; ?>

<div class="row">
 <div class="col-sm-6 col-sm-offset-3">
  <button class="btn btn-lg btn-default btn-block" data-toggle="collapse" data-target="#Keskeyta"> Keskeytä <i class="caret"></i></button>
  <div class="collapse" id="Keskeyta">
  <p>
	<form id="keskeytaLomake" action="<?php echo Yii::app()->request->baseUrl.'/index.php/site/keskeyta'; ?>" method="POST">
	      <input type="hidden" class="form-control" name="flight_id" value="<?php echo $model->flight_no_id; ?>">
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
