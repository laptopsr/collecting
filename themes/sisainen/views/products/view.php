<?php
/* @var $this ProductsController */
/* @var $model Products */


$arr = array(
		'id',
		'name',
		'barcode',
		'stowage',
		'group_no',

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
                                <li><i class="fa fa-dashboard fa-lg"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a></li>
		    		<?php if(Yii::app()->user->isAdmin()) : ?>
                                <li>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/products/admin'; ?>">tuotteiden hallinta</a></li>
                                <li class="active">  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/products/update?id='.$model->id; ?>">muokkaa tuotetta #<?php echo $model->id; ?></a></li>
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
         <h4><?php echo ucfirst($model->name); ?></h4>
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
	<p>
	<small>KP:&nbsp;<?php echo $model->stowage; ?> &nbsp;&nbsp;|&nbsp;&nbsp;R.nro:&nbsp; <?php echo $model->group_no; ?></small>
	<br>
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










