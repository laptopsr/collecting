<?php
/* @var $this FlightsController */
/* @var $model Flights */

$this->breadcrumbs=array(
	'Flights'=>array('index'),
	$model->id,
);


$arr = array(
		'id',
		'time',
		'status',
		'flight_no',
		'destination',
		'date',
		'collector_id',
		'collecting_start',
		'collecting_end',
		'collecting_totaltime',

	);

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
                                <li>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/flights/admin'; ?>">Lentorivien hallinta</a></li>
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
	'attributes'=> $arr,
   ));

?>


   </div>
 </div>
</div>
<!-- /.portlet -->
