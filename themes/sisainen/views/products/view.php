<?php
/* @var $this ProductsController */
/* @var $model Products */


$arr = array(
		'id',
		'name',
		'barcode',

	);

?>



                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                Tuotteet
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a></li>
		    		<?php if(Yii::app()->user->isAdmin()) : ?>
                                <li>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/status/admin'; ?>">tuotteiden hallinta</a></li>
                                <li class="active">  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/status/update?id='.$model->id; ?>">muokkaa tuotetta #<?php echo $model->id; ?></a></li>
		    		<?php endif; ?>
                                <li class="active">  tuote id #<?php echo $model->id; ?></li>
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

<br>

<?php echo CHtml::button('Tulosta tarra', array('class'=>'btn btn-default tulosta')); ?>


