<?php

class FlightsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	// <-- Teematus
        public function init()
        {

		if(Yii::app()->user->isGuest){
                        Yii::app()->theme = 'classic';
                } elseif(!Yii::app()->user->isGuest) {
                        Yii::app()->theme = 'sisainen';
                }
                parent::init();
        }
	//     Teematus -->

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Flights;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Flights']))
		{
			$model->attributes=$_POST['Flights'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Flights']))
		{
			$model->attributes=$_POST['Flights'];
			if($model->save())
			{

				$criteria = new CDbCriteria;
				$criteria->order = " id ASC ";
				$criteria->condition = " flight_no_id='".$model->id."' ";
				CollectorRows::model()->updateAll(array('status'=>$model->status), $criteria);

				if($model->status == 1)
				{
					Flights::model()->updateByPk($model->id, array(
						'keskeytys_syy'=>'',
						'collector_id'=>0,
						'collecting_start'=>''
					));
				}

				$this->redirect(array('//site/index'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Flights');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Flights('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Flights']))
			$model->attributes=$_GET['Flights'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Flights the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Flights::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Flights $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='flights-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function etuSukunimi($data)
	{

		$model=Profile::model()->findByPk($data->collector_id);
		if(isset($model->user_id))
		return $model->firstname.' '.$model->lastname;
	}

	protected function lentoLinkki($data)
	{
		$return = CHtml::link($data->flight_no, Yii::app()->request->baseUrl.'/index.php/collectorRows/admin?flights_id='.$data->id,
			 array('class'=>'link')
		);
		return $return;
	}


/*
	protected function kerailyaika($data)
	{

		if(!empty($data->collecting_end) 
			and !empty($data->collecting_start) 
			and strtotime($data->collecting_start) < strtotime($data->collecting_end)
		)
		{
			$result=strtotime($data->collecting_end)-strtotime($data->collecting_start);
			return $this->sprint($result);
		}
	}
*/
	protected function sprint($val){
	   	    if($val > 0)
		   	   return sprintf('%02d:%02d', $val/3600, ($val % 3600)/60);
	}


	protected function painikkeet($data)
	{


		echo '<div class="form-inline">';
		echo '<div class="form-group" style="margin-right: 7px;">';
		echo CHtml::link('<i class="fa fa-eye"></i>', '#', array(
		'submit'=>array('view', "id"=>$data->id), 
		));
		echo '</div><div class="form-group" style="margin-right: 7px;">';
		echo CHtml::link('<i class="fa fa-pencil-square-o"></i>', '#', array(
		'submit'=>array('update', "id"=>$data->id), 
		));
		echo '</div><div class="form-group">';
		echo CHtml::link('<i class="fa fa-trash-o"></i>', '#', array(
		'submit'=>array('delete', "id"=>$data->id),
		'confirm'=>'Haluatko varmaasti poista?',
		));
		echo '</div></div>';
	
	}

}
