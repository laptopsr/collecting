<?php
/* @var $this FlightsController */
/* @var $model Flights */

$this->breadcrumbs=array(
	'Flights'=>array('index'),
	$model->id,
);

?>


<?php
	$sivu = '';
	$translate = '';
	if($model->status == 1 )
	{
		$sivu = 'avoimet';
		$translate = 'Avoimet';

		// <-- sarakkeet
		$arr = array(
		'id',
		'flight_no',
		'destination',
		'date',
		);
		//   sarakkeet -->

	}
	if($model->status == 2 )
	{
		$sivu = 'kerailyssa';
		$translate = 'Keräilyssä';

		// <-- sarakkeet
		$arr = array(
		'id',
		'flight_no',
		'destination',
		'date',
		'collector_id',
		'collecting_start',
		);
		//   sarakkeet -->
	}
	if($model->status == 3 )
	{
		$sivu = 'keskeytetyt';
		$translate = 'Keskeytetyt';

		// <-- sarakkeet
		$arr = array(
		'id',
		'flight_no',
		'destination',
		'date',
		'collector_id',
		'collecting_start',
		'keskeytys_syy',
		);
		//   sarakkeet -->
	}
	if($model->status == 4 )
	{
		$sivu = 'valmiit';
		$translate = 'Valmiit';

		// <-- sarakkeet
		$arr = array(
		'id',
		'flight_no',
		'destination',
		'date',
		'collector_id',
		'collecting_start',
		'collecting_end',
		'collecting_totaltime',
		'barcode_kohde_osoite',
		);
		//   sarakkeet -->
	}

	// <-- Etusukunini muutos
	$model->collector_id = $this->etuSukunimi($model);
	// <-- Etusukunini muutos

	// <-- Barcoden nimetys muutos
	$checkOnko = FinishedCollectingLocation::model()->find(" barcode='".$model->barcode_kohde_osoite."' ");
	if(isset($checkOnko->id))
	{
		$model->barcode_kohde_osoite = $checkOnko->location_name;
	}
	// <-- Barcoden nimetys muutos

?>


                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                Lennot
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a></li>
                                <li class="active"> <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/flights/admin?'.$sivu; ?>"><?php echo $translate; ?></a></li>
                                <li class="active">  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/flights/update?id='.$model->id; ?>">muokkaa lentoriviä #<?php echo $model->id; ?></a></li>
                                <li class="active">  lentorivi #<?php echo $model->id; ?></li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->


<div class="portlet portlet-default">
  <div class="portlet-heading">
      <div class="portlet-title">
         <h4></h4>
      </div>
    <div class="clearfix"></div>
  </div>
  <div class="portlet-body">

<?php 
   $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => Yii::app()->request->baseUrl.'/css/view.css',
	'attributes'=> $arr,
   ));

?>


   </div>
 </div>
</div>
<!-- /.portlet -->
