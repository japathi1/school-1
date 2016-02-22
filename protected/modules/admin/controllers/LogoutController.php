<?php

class LogoutController extends Controller
{

	public function actionIndex() {
        unset(Yii::app()->session['user_id']);
        unset(Yii::app()->session['user_name']);
        unset(Yii::app()->session['date_arr']);
        $this->redirect(array("/admin/login"));
    }

}