<?php
/* @var $this AsiakkaatController */
/* @var $model Asiakkaat */


$arr = array(
		'id',
		'profile.firstname',
		'profile.lastname',
		'username',
		'password',
		'email',
		//'activkey',
		'create_at',
		'lastvisit_at',
		'superuser',
		'status',

	);

?>



                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                Profiilit
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a></li>
                                <li>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/user/admin'; ?>">Profiilien hallinta</a></li>
                                <li class="active">  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/user/admin/update/id/'.$model->id; ?>">muokkaa profiilia #<?php echo $model->id; ?></a></li>
                                <li class="active">  status #<?php echo $model->id; ?></li>
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
