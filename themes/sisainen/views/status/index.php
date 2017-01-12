<?php
/* @var $this AsiakkaatController */
/* @var $dataProvider CActiveDataProvider */
?>

                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                Statukset <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/status/create'; ?>" data-toggle="tooltip" data-placement="right" title="Luo status"><i class="fa fa-plus-square"></i></a>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a>
                                </li>
                                <li class="active">statukset</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->




<!-- /.portlet -->




<div class="portlet portlet-default">
  <div class="portlet-heading">
      <div class="portlet-title">
         <h4>Statukset</h4>
      </div>
    <div class="clearfix"></div>
  </div>
  <div class="portlet-body">
   <div class="table-responsive">


     <table class="table table-hovered">
     <tr>
 	<th></th>
 	<th>Nimi</th>
 	<th>Luojan ID nro.</th>
 	<th>Luonti aika</th>
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
		//'viewData' => array( 'netvisor' => $netvisor ),
	  	'template'=>'{items}<table class="table table-striped table-condensed"></table><br/>{pager}',
	)); ?>
     </table>


   </div>
 </div>
</div>
<!-- /.portlet -->
