<?php

class DashboardController extends Controller
{
	
	public $layout = '//layouts/column2';

	protected function beforeAction($action) {          
        if (!isFrontUserLoggedIn()) {
            $this->redirect(array("/admin/login"));
        }
        return parent::beforeAction($action);
    }

	public function actionIndex()
	{
		$this->render('index');
	}
}