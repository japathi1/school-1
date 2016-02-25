<?php

class DefaultController extends Controller
{
	
	public $layout = '//layouts/login_main';


    public function actionIndex(){

        if (!isFrontUserLoggedIn()) {
            $this->redirect(array("/admin/dashboard"));
        } else {
            $user_id = Yii::app()->session['user_id'];
            if ($user_id != NULL) {
                $this->redirect(array("/admin/dashboard"));
            } else
                $this->redirect(Yii::app()->controller->module->returnUrl);
        }
    }
}