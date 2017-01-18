<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- PACE LOAD BAR PLUGIN - This creates the subtle load bar effect at the top of the page. -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/plugins/pace/pace.css" rel="stylesheet">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/pace/pace.js"></script>

    <!-- GLOBAL STYLES - Include these on every page. -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/plugins/messenger/messenger.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/plugins/messenger/messenger-theme-flat.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/plugins/morris/morris.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/plugins/datatables/datatables.css" rel="stylesheet">

    <!-- THEME STYLES - Include these on every page. -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/style.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/plugins.css" rel="stylesheet">

    <!-- THEME DEMO STYLES - Use these styles for reference if needed. Otherwise they can be deleted. -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/css/demo.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/html5shiv.js"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/respond.min.js"></script>
    <![endif]-->

<?php
  $curpage = Yii::app()->getController()->getAction()->controller->id;
  $curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;

  Yii::app()->clientScript->registerPackage('jquery');
  //Yii::app()->clientScript->registerPackage('bootstrapJS');
  //Yii::app()->clientScript->registerPackage('bootstrapCSS');
?>


</head>

<body>

<?php
$curpage = Yii::app()->getController()->getAction()->controller->id;
$curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;

		// <-- Check varatut collector sivut
		$criteria = new CDbCriteria;
		$criteria->condition = " 
			status=1 
			AND user_is_collector_page!=0
			AND (user_is_collector_page_started + INTERVAL 5 MINUTE) < NOW() 
		";
		$onkoVarattu = Flights::model()->find($criteria);
		if(isset($onkoVarattu->id))
		{
			Flights::model()->updateByPk($onkoVarattu->id, 
			array(
				'user_is_collector_page_started'=>'0000-00-00 00:00:00',
				'user_is_collector_page'=>0
			));
		}
		//    Check varatut collector sivut -->

?>




    <div id="wrapper">

        <!-- begin TOP NAVIGATION -->
        <nav class="navbar-top" role="navigation">

            <!-- begin BRAND HEADING -->
            <div class="navbar-header" style="height: 50px;">

		<?php if(Yii::app()->user->isAdmin()) : ?>
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".sidebar-collapse">
                    <i class="fa fa-bars"></i> Menu
                </button>
		<?php endif; ?>

                <div class="navbar-brand">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/index" style="color:#ccc;">
			<?php echo Yii::app()->name; ?>
			
                        <!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/img/flex-admin-logo.png" data-1x="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/img/flex-admin-logo@1x.png" data-2x="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/img/flex-admin-logo@2x.png" class="hisrc img-responsive" alt="">-->
                    </a>
                </div>
            </div>
            <!-- end BRAND HEADING -->

            <div class="nav-top">

                <!-- begin LEFT SIDE WIDGETS -->
		<?php if(Yii::app()->user->isAdmin()) : ?>
                <ul class="nav navbar-left">
                    <li class="tooltip-sidebar-toggle">
                        <a href="#" id="sidebar-toggle" data-toggle="tooltip" data-placement="right" title="Piilota valikko">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    <!-- You may add more widgets here using <li> -->
                </ul>
		<?php endif; ?>
                <!-- end LEFT SIDE WIDGETS -->

                <!-- begin MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->
                <ul class="nav navbar-right">


                    <!-- begin USER ACTIONS DROPDOWN -->
		    <?php if(Yii::app()->user->isAdmin()) : ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">


                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/profile/edit">
                                    <i class="fa fa-user"></i> Profiili
                                </a>
                            </li>
                            <li>
                                <a class="logout_open" href="#logout">
                                    <i class="fa fa-sign-out"></i> Kirjaudu ulos
                                    <!--<strong><?php echo Yii::app()->user->firstname; ?> <?php echo Yii::app()->user->lastname; ?></strong>-->
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-menu -->
                    </li>
		    <?php else : ?>
                            <li>
                                <a class="logout_open" href="#logout">
                                    <i class="fa fa-sign-out"></i> Kirjaudu ulos
                                    <!--<strong><?php echo Yii::app()->user->firstname; ?> <?php echo Yii::app()->user->lastname; ?></strong>-->
                                </a>
                            </li>
		    <?php endif; ?>
                    <!-- /.dropdown -->
                    <!-- end USER ACTIONS DROPDOWN -->

                </ul>
                <!-- /.nav -->
                <!-- end MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->

            </div>
            <!-- /.nav-top -->
        </nav>
        <!-- /.navbar-top -->
        <!-- end TOP NAVIGATION -->

        <!-- begin SIDE NAVIGATION -->
        <nav class="navbar-side" role="navigation">
            <div class="navbar-collapse sidebar-collapse collapse">
                <ul id="side" class="nav navbar-nav side-nav">
                    <!-- begin SIDE NAV USER PANEL -->
                    <li class="side-user hidden-xs">
                        <!--<img class="img-circle" src="img/profile-pic.jpg" alt="">-->
                        <p class="welcome">
                            <i class="fa fa-key"></i> Kirjauduttu tunnuksella
                        </p>
                        <p class="name tooltip-sidebar-logout">
                            <?php echo Yii::app()->user->firstname; ?>
                            <span class="last-name"><?php echo Yii::app()->user->lastname; ?></span> <a style="color: inherit" class="logout_open" href="logout" data-toggle="tooltip" data-placement="top" title="Kirjaudu ulos"><i class="fa fa-sign-out"></i></a>
                        </p>
                        <div class="clearfix"></div>
                    </li>
                    <!-- end SIDE NAV USER PANEL -->
                    <!-- begin SIDE NAV SEARCH -->
	<!--	    <?php if(Yii::app()->user->isAdmin()) : ?>
                    <li class="nav-search">
                        <form role="form">
                            <input type="search" class="form-control" placeholder="Search...">
                            <button class="btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li>
		    <?php endif; ?>-->
                    <!-- end SIDE NAV SEARCH -->
                    <!-- begin DASHBOARD LINK -->
		    <?php if(Yii::app()->user->isAdmin()) : ?>
                    <li>
                        <a class="<?php if($curpage == 'site/index') echo 'active'; ?>" href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">
                            <i class="fa fa-dashboard"></i> Etusivu
                        </a>
                    </li>
                    <!-- end DASHBOARD LINK -->


                    <li>
                        <a class="<?php if($curpage == 'admin/admin') echo 'active'; ?>" href="<?php echo Yii::app()->request->baseUrl.'/index.php/user/admin'; ?>">
                            <i class="fa fa-users"></i> Työntekijät
                        </a>
                    </li>
                    <li class="panel">
                        <a class="<?php if($curpage == 'flights/admin') echo 'active'; ?>" href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#asiakkaat">
                            <i class="fa fa-shopping-cart"></i> Keräily <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse <?php if($curpage == 'asiakkaat/index' or $curpage == 'asiakkaat/create' or $curpage == 'asiakkaat/update') echo 'in'; ?> nav" id="asiakkaat">

                    	 <li>
	                        <a class="<?php if($curpage == 'asiakkaat/create') echo 'active'; ?>" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/flights/admin?avoimet">
	                            <i class="fa fa-flag"></i> Avoimet
	                        </a>
	                 </li>

                    	 <li>
	                        <a class="<?php if($curpage == 'asiakkaat/index') echo 'active'; ?>" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/flights/admin?kerailyssa">
	                            <i class="fa fa-gears"></i> Keräilyssä
	                        </a>
	                 </li>

                    	 <li>
	                        <a class="<?php if($curpage == 'asiakkaat/index') echo 'active'; ?>" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/flights/admin?keskeytetyt">
	                            <i class="fa fa-ban"></i> Keskeytetyt
	                        </a>
	                 </li>

                    	 <li>
	                        <a class="<?php if($curpage == 'asiakkaat/index') echo 'active'; ?>" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/flights/admin?valmiit">
	                            <i class="fa fa-archive"></i> Valmiit
	                        </a>
	                 </li>
                        </ul>
                    </li>
                    <li>
                        <a class="<?php if($curpage == 'products/admin') echo 'active'; ?>" href="<?php echo Yii::app()->request->baseUrl.'/index.php/products/admin'; ?>">
                            <i class="fa fa-barcode"></i> Tulosta tarra
                        </a>
                    </li>
                    <li>
                        <a class="<?php if($curpage == 'status/admin') echo 'active'; ?>" href="<?php echo Yii::app()->request->baseUrl.'/index.php/status/admin'; ?>">
                            <i class="fa fa-users"></i> Statukset
                        </a>
                    </li>
                    <li>
                        <a class="<?php if($curpage == 'finishedCollectingLocation/admin') echo 'active'; ?>" href="<?php echo Yii::app()->request->baseUrl.'/index.php/finishedCollectingLocation/admin'; ?>">
                            <i class="fa fa-location-arrow"></i> Keläilyjen sijainnit
                        </a>
                    </li>
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#teemaus">
                            <i class="fa fa-eyedropper"></i> Teemaus <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="teemaus">
                    	 <li>
	                        <a class="link changePortlet" portlet="default">
	                            <i class="fa fa-eyedropper"></i> Black
	                        </a>
	                 </li>
                    	 <li>
	                        <a class="link changePortlet" portlet="info">
	                            <i class="fa fa-eyedropper"></i> Info
	                        </a>
	                 </li>
                    	 <li>
	                        <a class="link changePortlet" portlet="blue">
	                            <i class="fa fa-eyedropper"></i> Blue
	                        </a>
	                 </li>
                    	 <li>
	                        <a class="link changePortlet" portlet="green">
	                            <i class="fa fa-eyedropper"></i> Green
	                        </a>
	                 </li>
                    	 <li>
	                        <a class="link changePortlet" portlet="orange">
	                            <i class="fa fa-eyedropper"></i> Orange
	                        </a>
	                 </li>
                    	 <li>
	                        <a class="link changePortlet" portlet="red">
	                            <i class="fa fa-eyedropper"></i> Red
	                        </a>
	                 </li>
                    	 <li>
	                        <a class="link changePortlet" portlet="purple">
	                            <i class="fa fa-eyedropper"></i> Purple
	                        </a>
	                 </li>
                        </ul>
                    </li>
		    <?php endif; ?>

                </ul>
                <!-- /.side-nav -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <!-- /.navbar-side -->
        <!-- end SIDE NAVIGATION -->



        <?php /*<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.2.min.js"></script>*/?>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/bootstrap/bootstrap.min.js"></script>

        <!-- begin MAIN PAGE CONTENT -->
        <div id="page-wrapper">

            <div class="page-content">
		<?php echo $content; ?>
            </div>
            <!-- /.page-content -->

        </div>
        <!-- /#page-wrapper -->
        <!-- end MAIN PAGE CONTENT -->

    </div>
    <!-- /#wrapper -->

    <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/popupoverlay/defaults.js"></script>
    <!-- Logout Notification Box -->
    <div id="logout">
        <div class="logout-message">
          <!--  <img class="img-circle img-logout" src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/img/profile-pic.jpg" alt="">-->
	<br>
            <h3>
                <i class="fa fa-sign-out text-green"></i> Haluatko kirjautua ulos?
            </h3>
            <p>Valitse "Ulos" <br> lopettaaksesi istuntosi.</p>
            <ul class="list-inline">
                <li>
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/logout" class="btn btn-green">
                        <strong>Ulos</strong>
                    </a>
                </li>
                <li>
                    <button class="logout_close btn btn-green">Peruuta</button>
                </li>
            </ul>
        </div>
    </div>
    <!-- /#logout -->
    <!-- Logout Notification jQuery -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/popupoverlay/logout.js"></script>
    <!-- HISRC Retina Images -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/hisrc/hisrc.js"></script>

    <!-- PAGE LEVEL PLUGIN SCRIPTS -->
    <!-- HubSpot Messenger -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/messenger/messenger.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/messenger/messenger-theme-flat.js"></script>
    <!-- Date Range Picker -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/daterangepicker/moment.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Flot Charts -->
    <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/flot/jquery.flot.resize.js"></script>-->
    <!-- Sparkline Charts -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- Moment.js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/moment/moment.min.js"></script>
    <!-- jQuery Vector Map -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/demo/map-demo-data.js"></script>
    <!-- Easy Pie Chart -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/easypiechart/jquery.easypiechart.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/plugins/datatables/datatables-bs3.js"></script>

    <!-- THEME SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/flex.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/sisainen_assets/js/demo/dashboard-demo.js"></script>
    <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.pulse.js"></script>-->


<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
/*
$(document).ready(function(){

  $('.vilkku').pulse({opacity: 0.3}, 
    {
     duration : 2250,
     pulses   : 10000,
     interval : 300
 });

});
*/
</script>

</body>

</html>

