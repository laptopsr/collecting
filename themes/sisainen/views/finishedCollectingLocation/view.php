<?php
/* @var $this AsiakkaatController */
/* @var $model Asiakkaat */


$arr = array(
		'id',
		//'time',
		'location_name',
		'barcode',

	);

?>



                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                Sijainnit
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a></li>
                                <li>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/finishedCollectingLocation/admin'; ?>">sijaintien hallinta</a></li>
                                <li class="active">  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/finishedCollectingLocation/update?id='.$model->id; ?>">muokkaa sijaintia #<?php echo $model->id; ?></a></li>
                                <li class="active">  sijainti #<?php echo $model->id; ?></li>
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
         <h4><?php echo $model->location_name; ?></h4>
      </div>
    <div class="clearfix"></div>
  </div>
  <div class="portlet-body">
   <div class="table-responsive" style="border:none">
	
	<?php 
	   $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'cssFile' => Yii::app()->request->baseUrl.'/css/view.css',
		'attributes'=> $arr,
	   ));

	?>
	<br>
	<small><?php echo $model->location_name; ?></small>
	<p>
	<?php
	$viivakoodi = $model->barcode;
	echo '<img src="'.Yii::app()->getBaseUrl(true) .'/barcode_generator/index.php?viivakoodi='.$viivakoodi.'">';
	?>
	</p>

	<br>
	<p><?php echo CHtml::button('Tulosta tarra', array('submit'=>array('view', "id"=>$model->id, "pdf"=>true), 'class'=>'btn btn-default')); ?></p>
  </div>
 </div>
</div>
<!-- /.portlet -->
