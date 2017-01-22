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
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('index', 'collecting', 'collecting_product', 'collecting_product_quantity', 'collecting_product_for_next', 'insert_barcode_kohde_osoite', 'collecting_accept', 'keskeyta', 'keskeyta_rows', 'check_barcode', 'collecting_all_done', 'search_ready_coll'),
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



	public function actionCollecting_all_done()
	{
		
		$this->render('collecting_all_done', array(
			//'isMessage'=>$isMessage
		));
	}


	public function actionSearch_ready_coll()
	{

		$barcode = '';
		if(isset($_POST['barcode']))
			$barcode = $_POST['barcode'];
		if(isset($_GET['barcode']))
			$barcode = $_GET['barcode'];			

		$model = new Flights;

		if(isset($_POST['barcode']) or isset($_GET['barcode']))
		{
			$criteria = new CDbCriteria;
			//$criteria->order = "  "; 
			$criteria->condition = " barcode_ready_collecting='".$barcode."' ";
			$model = Flights::model()->find($criteria);
		}
		

		$this->render('search_ready_coll', array(
			'model'=>$model,
			'barcode'=>$barcode
		));
	}

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


		// <-- Olenko ma kerailyssa
		$criteria = new CDbCriteria;
		$criteria->order = " id ASC "; 
		$criteria->limit = 1; // viimeinen 1 rivi
		$criteria->condition = " status=2 AND collector_id='".Yii::app()->user->id."' ";
		$checkKerailyssa = Flights::model()->find($criteria);
		if(isset($checkKerailyssa->id))
			$this->redirect('collecting_product?id='.$checkKerailyssa->id);
		//    Olenko ma kerailyssa -->
	

		// <-- Get last row from Flights
		$criteria = new CDbCriteria;
		$criteria->order = " id DESC "; 
		$criteria->limit = 1; // viimeinen 1 rivi
		$criteria->condition = " 
			status=1 
			AND ( user_is_collector_page=0 OR user_is_collector_page='".Yii::app()->user->id."' )
		";
		$lastRowModel = Flights::model()->find($criteria);
		//    Get last row from Flights -->

		$cr = array();
		if(isset($lastRowModel->id))
		{
			$criteria = new CDbCriteria;
			$criteria->condition = " flight_no_id='".$lastRowModel->id."' ";
			$cr = CollectorRows::model()->findAll($criteria);

			Flights::model()->updateByPk($lastRowModel->id, array(
				'user_is_collector_page'=>Yii::app()->user->id,
				'user_is_collector_page_started'=>date("Y-m-d H:i:s")
			));
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
		$criteria->condition = " flight_no_id='".$id."' AND status!=4 ";
		$model = CollectorRows::model()->find($criteria);
	
		// <-- update status
		if(isset($model->id))
		{
			Flights::model()->updateByPk($id, array(
					'status'=>2,
					'collector_id'=>Yii::app()->user->id,
					'collecting_start'=>date("d.m.Y H:i")
			));


			CollectorRows::model()->updateAll(array('status'=>2), $criteria);
		}
		//     update status -->

		$this->render('collecting_product', array(
			'model'=>$model,
			'flights_id'=>$id,
		));
	}

	public function actionCollecting_product_quantity($id)
	{

		$model = CollectorRows::model()->findByPk($id);


		$criteria = new CDbCriteria;
		$criteria->condition = " flight_no_id='".$model->flight_no_id."' AND status!=4 ";
		$cr4 = CollectorRows::model()->findAll($criteria);
		
		if( count($cr4) > 0 )
			$takaisin = true;
		else
			$takaisin = false;

		$this->render('collecting_product_quantity', array(
			'model'=>$model,
			'takaisin'=>$takaisin
		));
	}


	public function actionCollecting_product_for_next($row_id, $flights_id)
	{
		CollectorRows::model()->updateByPk($row_id, array('status'=>4));

		$criteria = new CDbCriteria;
		$criteria->condition = " flight_no_id='".$flights_id."' AND status!=4 ";
		$model = CollectorRows::model()->find($criteria);
	
		if(isset($model->id))
		{
			$this->redirect('collecting_product?id='.$flights_id);
		} else {
			$this->redirect('collecting_accept?id='.$flights_id.'&row_id='.$row_id);
		}

	}


	public function actionKeskeyta()
	{

		$id = $_POST['flight_id'];

		Flights::model()->updateByPk($id, array('status'=>3, 'keskeytys_syy'=>$_POST['keskeytys_syy']));

		$criteria = new CDbCriteria;
		$criteria->order = " id ASC ";
		$criteria->condition = " flight_no_id='".$id."' ";

		CollectorRows::model()->updateAll(array('status'=>3), $criteria);

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

	public function actionCollecting_accept($id, $row_id)
	{

		$model = Flights::model()->findByPk($id);

		$this->render('collecting_accept', array('model'=>$model, 'row_id'=>$row_id));
		
	}

	public function actionInsert_barcode_kohde_osoite($id)
	{
		$checkOnko = FinishedCollectingLocation::model()->find(" barcode='".$_POST['barcode']."' ");
		if(!isset($checkOnko->id))
		{
			echo json_encode(array('ERROR'=>'Sijaintia ei tunneta. Tarkista sijainti tai lisää uusi.'));
			exit;
		}

		$model = Flights::model()->findByPk($id);

		$collecting_start = $model->collecting_start;
		$collecting_end = date("d.m.Y H:i");
		$collecting_totaltime = '00:00';

		if(strtotime($collecting_start) < strtotime($collecting_end))
		{
			$result=strtotime($collecting_end)-strtotime($collecting_start);
			$collecting_totaltime = $this->sprint($result);
		}

		$update = Flights::model()->updateByPk($id, array(
			'barcode_kohde_osoite'=>$_POST['barcode'],
			'status'=>4,
			'collecting_end'=>$collecting_end,
			'collecting_totaltime'=>$collecting_totaltime,
			'barcode_ready_collecting'=>$id.date("His")
		));

		echo json_encode(array('OK'=>'Barcode lisätty.'));
		
	}

	protected function sprint($val){
	   	    if($val > 0)
		   	   return sprintf('%02d:%02d', $val/3600, ($val % 3600)/60);
	}

}
