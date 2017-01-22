<?php
/* @var $this ProductsController */
/* @var $model Products */


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#status-grid').yiiGridView('update', {
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
                                Hallitse tuotteita <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/products/create'; ?>" data-toggle="tooltip" data-placement="right" title="Luo uusi tuote"><i class="fa fa-plus-square"></i></a>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo Yii::app()->request->baseUrl.'/index.php/site/index'; ?>">Etusivu</a>
                                </li>
                                <li class="active">Kaikki tuotteet</li>
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
                                    <h4>Tuote lista</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">



<?php echo CHtml::link('Haku','#',array('class'=>'search-button btn btn-default')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'status-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table',
	'columns'=>array(
		'id',
		//'time',
		'name',
		'barcode',
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
                'label' => '<i class="fa fa-eye"></i>',
                'imageUrl' => false,
            ),
            'update' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Muokkaa')),
                'label' => '<i class="fa fa-pencil"></i>',
                'imageUrl' => false,
            ),
            'delete' => array(
                'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Poista')),
                'label' => '<i class="fa fa-times"></i>',
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
