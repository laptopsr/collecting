<?php

?>


                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                <?php echo  UserModule::t('Muokkaa profiilia'); ?> <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/user/user/create'; ?>" data-toggle="tooltip" data-placement="right" title="Luo uusi profiili"><i class="fa fa-plus-square"></i></a>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard fa-lg"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a></li>
                                <li><i class=""></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/user/admin'; ?>">Kaikki profiilit</a></li>
                                <li class="active"><?php echo  UserModule::t('Muokkaa profiilia')." ".$model->username; ?></li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->



                    <!-- Striped Responsive Table -->
                        <div class="portlet portlet-default">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Muokkaa</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>


                                </div>
                            </div>
                        </div>
                        <!-- /.portlet -->
