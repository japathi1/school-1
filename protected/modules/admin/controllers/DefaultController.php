<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLogin() {
        $this->layout = '//layouts/login_main';
        if (!isFrontUserLoggedIn()) {
            $model = new FrontUserLogin;
            $mail_sent_message = '';
            // collect user input data
            if (isset($_POST['FrontUserLogin'])) {
                $model->attributes = $_POST['FrontUserLogin'];
                // validate user input and redirect to previous page if valid
                if ($model->validate()) {

                    $user_id = $_SESSION['user_id'];
                    $this->logEntry($user_id);
                    $this->redirect(array("accountsummary"));
                }
            }
            // display the login form
            $this->render('login', array('model' => $model, 'mail_sent_message' => $mail_sent_message));
        } else {
            $user_id = Yii::app()->session['user_id'];
            if ($user_id != '') {
                $this->redirect(array("accountsummary"));
            } else
                $this->redirect(Yii::app()->controller->module->returnUrl);
        }
    }
}