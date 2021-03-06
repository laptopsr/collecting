<?php
/* @var $this ProductsController */
/* @var $model Products */

?>

		    <?php if(Yii::app()->user->isAdmin()) : ?>


                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                Tuotteet
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard fa-lg"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a></li>
                                <li>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/products/admin'; ?>">tuotteiden hallinta</a></li>
                                <li class="active">  tuotteet #<?php echo $model->id; ?></li>
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
         <h4>Muokkaa tuotetta #<?php echo $model->id; ?></h4>
      </div>
    <div class="clearfix"></div>
  </div>
  <div class="portlet-body">


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


   </div>
 </div>
</div>
<!-- /.portlet -->
		    <?php endif; ?>
