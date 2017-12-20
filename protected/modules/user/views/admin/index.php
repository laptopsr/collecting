<?php
$this->breadcrumbs=array(
	UserModule::t('Profiili')=>array('/user'),
	UserModule::t('Hallitse profiileja'),
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                Hallitse profiileja <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/user/user/create'; ?>" data-toggle="tooltip" data-placement="right" title="Luo uusi profiili"><i class="fa fa-plus-square"></i></a>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard fa-lg"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a>
                                </li>
                                <li class="active">Kaikki profiilit</li>
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
                                    <h4>Henkilöstö</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,

        'pagerCssClass' => 'dataTables_paginate paging_bootstrap',
        'itemsCssClass' => 'table table-striped small table-hover',

	'columns'=>array(
		array(
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
		),
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
		),
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
		),
		array(
        		'name'  => 'create_at',
			'value'=>'date("d.m.Y H:i", strtotime($data->create_at))',
		),
		array(
        		'name'  => 'lastvisit_at',
			'value'=>array($this,'visitMuutos'),
			'type'=>'raw'
		),

		array(
			'name'=>'superuser',
			'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
			'filter'=>User::itemAlias("AdminStatus"),
		),
		array(
			'name'=>'status',
			'value'=>'User::itemAlias("UserStatus",$data->status)',
			'filter' => User::itemAlias("UserStatus"),
		),
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
	),
)); ?>

                                </div>
                            </div>
                        </div>
                        <!-- /.portlet -->



