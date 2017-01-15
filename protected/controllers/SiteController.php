<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
            		'yiichat'=>array('class'=>'YiiChatAction'),
		);
	}


	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', 
				'actions'=>array('index', 'collecting', 'collecting_product', 'collecting_product_quantity', 'keskeyta', 'keskeyta_rows', 'check_barcode'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array(''),
				'users'=>array('@'),
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




	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		$this->render('index', array(
			//'isMessage'=>$isMessage
		));
	}



	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')

		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionCollecting()
	{
		// <-- Get last row from Flights
		$criteria = new CDbCriteria;
		$criteria->order = " id DESC "; 
		$criteria->limit = 1; // viimeinen 1 rivi
		$criteria->condition = " status=1 ";
		$lastRowModel = Flights::model()->find($criteria);
		//    Get last row from Flights -->

		$cr = array();
		if(isset($lastRowModel->id))
		{
			$criteria = new CDbCriteria;
			$criteria->condition = " flight_no_id='".$lastRowModel->id."' ";
			$cr = CollectorRows::model()->findAll($criteria);
		}

		$this->render('collecting', array(
			'lastRowModel'=>$lastRowModel,
			'cr'=>$cr,
		));
	}

	public function actionCollecting_product($id)
	{

		$criteria = new CDbCriteria;
		$criteria->order = " id ASC ";
		$criteria->condition = " flight_no_id='".$id."' ";
		$model = CollectorRows::model()->find($criteria);


		$this->render('collecting_product', array(
			'model'=>$model,
		));
	}

	public function actionCollecting_product_quantity($id)
	{

		$model = CollectorRows::model()->findByPk($id);

		$this->render('collecting_product_quantity', array(
			'model'=>$model,
		));
	}


	public function actionKeskeyta($id)
	{

		Flights::model()->updateByPk($id, array('status'=>3));
		$this->redirect(Yii::app()->homeUrl);
		
	}

	public function actionKeskeyta_rows($id)
	{

		CollectorRows::model()->updateByPk($id, array('status'=>3));
		$this->redirect(Yii::app()->homeUrl);
		
	}

	public function actionCheck_barcode($id)
	{

		$criteria = new CDbCriteria;
		$criteria->condition = " 
			id='".$id."' 
			AND barcode='".trim($_POST['barcode'])."'
		";
		$model = CollectorRows::model()->find($criteria);


		if(isset($model->id))
			echo json_encode(array('OK'=>'Barcode on sama'));
		else
			echo json_encode(array('ERROR'=>$_POST['barcode'].' '.$id));

	}


}
