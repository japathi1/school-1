<?php

class DashboardController extends Controller
{
	
	public $layout = '//layouts/school_column2';

	protected function beforeAction($action) {          
        if (Yii::app()->user->isGuest) {
            $this->redirect(array("/school/login"));
        }
        return parent::beforeAction($action);
    }

	public function actionIndex()
	{
		$this->render('index');
	}
}