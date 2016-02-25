<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		if(Yii::app()->user->id){
			$this->redirect(array("/school/dashboard"));
		} else {
			$this->redirect(array("/school/login"));
		}
	}
}