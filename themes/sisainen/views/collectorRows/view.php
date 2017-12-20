<?php
/* @var $this CollectorRowsController */
/* @var $model CollectorRows */


$arr = array(
		'id',
		'time',
		'flight_no_id',
		'status',
		'product_name',
		'quantity',
		'barcode',
		'description',
		'unit',
		'stowage',
		'group_no',

	);

	// <-- status muutos
	if ($model->status == '1')
	$model->status = 'Avoin';
	if ($model->status == '2')
	$model->status = 'Keräilyssä';
	if ($model->status == '3')
	$model->status = 'Keskeytetty';
	if ($model->status == '4')
	$model->status = 'Valmis';
	// <-- status muutos

?>



                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                Kerättävät tuotteet
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard fa-lg"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a></li>
                                <li>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/collectorRows/admin'; ?>">Kaikki kerättävät tuotteet</a></li>
                                <li class="active">  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/collectorRows/update?id='.$model->id; ?>">muokkaa kerättävää tuotetta #<?php echo $model->id; ?></a></li>
                                <li class="active">  tuote #<?php echo $model->id; ?></li>
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
         <h4><?php echo ucfirst($model->product_name); ?></h4>
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
