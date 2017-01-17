<?php
/* @var $this FlightsController */
/* @var $model Flights */
?>

<?php
	$sivu = '';
	$translate = '';
	if($model->status == 1 )
	{
		$sivu = 'avoimet';
		$translate = 'Avoimet';
	}
	if($model->status == 2 )
	{
		$sivu = 'kerailyssa';
		$translate = 'Keräilyssä';
	}
	if($model->status == 3 )
	{
		$sivu = 'keskeytetyt';
		$translate = 'Keskeytetyt';
	}
	if($model->status == 4 )
	{
		$sivu = 'valmiit';
		$translate = 'Valmiit';
	}
?>


                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                Lentot
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a></li>
                                <li class="active"> <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/flights/admin?'.$sivu; ?>"><?php echo $translate; ?></a></li>
                                <li class="active"> Muokkaa lentoa <?php echo $model->id; ?></li>
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
         <h4>Lento <?php echo $model->id; ?></h4>
      </div>
    <div class="clearfix"></div>
  </div>
  <div class="portlet-body">

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

   </div>
 </div>
</div>
<!-- /.portlet -->
