<?php
/* @var $this FlightsController */
/* @var $model Flights */


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#flights-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$sivu = '';
	if(isset($_GET['avoimet']))
	{
		$sivu = 'Avoimet';
		$sarakkeet = array(
		'id',
		//'time',
		array(
        		'name'  => 'flight_no',
			'value'=>array($this,'lentoLinkki'),
			'type'=>'raw',
		),
		'destination',
		'date',
		// <-- Painikkeet

array(
        'class' => 'zii.widgets.grid.CButtonColumn',
        'htmlOptions' => array('style' => 'white-space: nowrap'),
        'afterDelete' => 'function(link,success,data) { if (success && data) alert(data); }',
        // 'template' => '{plus} {view} {update} {delete}',
        'buttons' => array(
        /*
	'plus' => array(
	'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'View')),
	'label' => '<i class="fa fa-plus"></i>',
	'imageUrl' => false,
	),
	*/
            'view' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Katso')),
                'label' => '<span class="btn btn-default btn-md"><i class="fa fa-eye fa-lg"></i></span>',
                'imageUrl' => false,
            ),
            'update' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Muokkaa')),
                'label' => '<span class="btn btn-purple btn-md"><i class="fa fa-pencil fa-lg"></i></span>',
                'imageUrl' => false,
            ),
            'delete' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Poista')),
                'label' => '<span class="btn btn-orange btn-md"><i class="fa fa-times fa-lg"></i></span>',
                'imageUrl' => false,
            )
        )
    ),
		//     Painikkeet -->
		);
	}

	if(isset($_GET['kerailyssa']))
	{
		$sivu = 'Kerailyssä';
		$sarakkeet = array(
		'id',
		//'time',
		array(
        		'name'  => 'flight_no',
			'value'=>array($this,'lentoLinkki'),
			'type'=>'raw',
		),
		'destination',
		array(
        		'name'  => 'collector_id',
			'value'=>array($this,'etuSukunimi'),
		),
		'collecting_start',
		// <-- Painikkeet

array(
        'class' => 'zii.widgets.grid.CButtonColumn',
        'htmlOptions' => array('style' => 'white-space: nowrap'),
        'afterDelete' => 'function(link,success,data) { if (success && data) alert(data); }',
        // 'template' => '{plus} {view} {update} {delete}',
        'buttons' => array(
        /*
	'plus' => array(
	'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'View')),
	'label' => '<i class="fa fa-plus"></i>',
	'imageUrl' => false,
	),
	*/
            'view' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Katso')),
                'label' => '<span class="btn btn-default btn-md"><i class="fa fa-eye fa-lg"></i></span>',
                'imageUrl' => false,
            ),
            'update' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Muokkaa')),
                'label' => '<span class="btn btn-purple btn-md"><i class="fa fa-pencil fa-lg"></i></span>',
                'imageUrl' => false,
            ),
            'delete' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Poista')),
                'label' => '<span class="btn btn-orange btn-md"><i class="fa fa-times fa-lg"></i></span>',
                'imageUrl' => false,
            )
        )
    ),
		//     Painikkeet -->
		);
	}

	if(isset($_GET['keskeytetyt']))
	{
		$sivu = 'Keskeytetyt';
		$sarakkeet = array(
		'id',
		//'time',
		array(
        		'name'  => 'flight_no',
			'value'=>array($this,'lentoLinkki'),
			'type'=>'raw',
		),
		'destination',
		array(
        		'name'  => 'collector_id',
			'value'=>array($this,'etuSukunimi'),
		),
		'collecting_start',
		'keskeytys_syy',
		// <-- Painikkeet

array(
        'class' => 'zii.widgets.grid.CButtonColumn',
        'htmlOptions' => array('style' => 'white-space: nowrap'),
        'afterDelete' => 'function(link,success,data) { if (success && data) alert(data); }',
        // 'template' => '{plus} {view} {update} {delete}',
        'buttons' => array(
        /*
	'plus' => array(
	'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'View')),
	'label' => '<i class="fa fa-plus"></i>',
	'imageUrl' => false,
	),
	*/
            'view' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Katso')),
                'label' => '<span class="btn btn-default btn-md"><i class="fa fa-eye fa-lg"></i></span>',
                'imageUrl' => false,
            ),
            'update' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Muokkaa')),
                'label' => '<span class="btn btn-purple btn-md"><i class="fa fa-pencil fa-lg"></i></span>',
                'imageUrl' => false,
            ),
            'delete' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Poista')),
                'label' => '<span class="btn btn-orange btn-md"><i class="fa fa-times fa-lg"></i></span>',
                'imageUrl' => false,
            )
        )
    ),
		//     Painikkeet -->
		);
	}

	if(isset($_GET['valmiit']))
	{
		$sivu = 'Valmiit';
		$sarakkeet = array(
		'id',
		//'time',
		array(
        		'name'  => 'flight_no',
			'value'=>array($this,'lentoLinkki'),
			'type'=>'raw',
		),
		'destination',
		array(
        		'name'  => 'collector_id',
			'value'=>array($this,'etuSukunimi'),
		),
		'collecting_start',
		'collecting_end',
		'collecting_totaltime',
		// <-- Painikkeet

array(
        'class' => 'zii.widgets.grid.CButtonColumn',
        'htmlOptions' => array('style' => 'white-space: nowrap'),
        'afterDelete' => 'function(link,success,data) { if (success && data) alert(data); }',
        // 'template' => '{plus} {view} {update} {delete}',
        'buttons' => array(
        /*
	'plus' => array(
	'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'View')),
	'label' => '<i class="fa fa-plus"></i>',
	'imageUrl' => false,
	),
	*/
            'view' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Katso')),
                'label' => '<span class="btn btn-default btn-md"><i class="fa fa-eye fa-lg"></i></span>',
                'imageUrl' => false,
            ),
            'update' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Muokkaa')),
                'label' => '<span class="btn btn-purple btn-md"><i class="fa fa-pencil fa-lg"></i></span>',
                'imageUrl' => false,
            ),
            'delete' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Poista')),
                'label' => '<span class="btn btn-orange btn-md"><i class="fa fa-times fa-lg"></i></span>',
                'imageUrl' => false,
            )
        )
    ),
		//     Painikkeet -->
		);
	}
?>


                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                Lennot
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard fa-lg"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a></li>
                                <li class="active"> <?php echo $sivu; ?></li>
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
         <h4>Lista</h4>
      </div>
    <div class="clearfix"></div>
  </div>
  <div class="portlet-body">


<?php echo CHtml::link('Haku','#',array('class'=>'search-button btn btn-default')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'flights-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,

        'pagerCssClass' => 'dataTables_paginate paging_bootstrap',
        'itemsCssClass' => 'table table-striped table-hover',

	'columns'=>$sarakkeet
)); ?>
</div>


   </div>
 </div>
</div>
<!-- /.portlet -->
