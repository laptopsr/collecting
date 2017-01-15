    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">


                <!-- begin PAGE TITLE AREA -->
                <!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">

                            
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE AREA -->



                <!-- begin DASHBOARD CIRCLE TILES -->
                <div class="row">

		    <?php if(Yii::app()->user->isAdmin()) : ?>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/admin">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-user fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Työntekijät
                                </div>
                                <div class="circle-tile-number text-faded">
                                    0
                                    <span id="sparklineA"></span>
                                </div>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/admin" class="circle-tile-footer">Kaikki käyttäjät <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
		    <?php endif; ?>


                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/collecting">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-database fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Aloita keräily
                                </div>
                                <div class="circle-tile-number text-faded">
                                    0
                                </div>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/collecting" class="circle-tile-footer">Hallinta <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/collecting">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-barcode fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Tulosta tarra
                                </div>
                                <div class="circle-tile-number text-faded">
                                    0
                                </div>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/collecting" class="circle-tile-footer">Hallinta <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

		    <?php if(Yii::app()->user->isAdmin()) : ?>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading yellow">
                                    <i class="fa fa-flag fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content yellow">
                                <div class="circle-tile-description text-faded">
                                    Avoimet
                                </div>
                                <div class="circle-tile-number text-faded">
                                    0
                                </div>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/varasto?id='.$data->id.'" class="circle-tile-footer">Hallinta <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-gears fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-description text-faded">
                                    Keräilyssä
                                </div>
                                <div class="circle-tile-number text-faded">
                                    0
                                </div>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/varasto?id='.$data->id.'" class="circle-tile-footer">Hallinta <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-ban fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Keskeytetyt
                                </div>
                                <div class="circle-tile-number text-faded">
                                    0
                                </div>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/varasto?id='.$data->id.'" class="circle-tile-footer">Hallinta <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-archive fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Valmiit
                                </div>
                                <div class="circle-tile-number text-faded">
                                    0
                                </div>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/varasto?id='.$data->id.'" class="circle-tile-footer">Hallinta <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
		    <?php endif; ?>
                <!-- end DASHBOARD CIRCLE TILES -->


    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/fullcalendar/jquery-ui.custom.min.js"></script>
    <!-- Morris Charts -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/morris/morris.js"></script>


    <!-- PAGE LEVEL PLUGIN SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

    <!-- THEME SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/demo/calendar-demo.js"></script>


