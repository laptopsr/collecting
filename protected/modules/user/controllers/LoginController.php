<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;
			// collect user input data
			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if($model->validate()) {




					$this->lastViset();
					if (Yii::app()->user->returnUrl=='/index.php')
						$this->redirect(array('/site/index'));
					else
						$this->redirect(array('/site/index'));
				}
				/* else {
					$this->redirect(Yii::app()->request->baseUrl.'/index.php/user/login?error');
				} */
			}
			// display the login form
			$this->renderPartial('/user/login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}

}
