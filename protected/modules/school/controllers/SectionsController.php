<?php

class SectionsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/school_column2';

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
			array('allow',
                'actions' => array('index', 'create', 'update', 'view', 'manage', 'delete','prevsections'),
                'users' => array('@'),
                'expression' => '(isset($user->role) && ($user->role === "Principal"))||(isset($user->role) && ($user->role === "Account Manager"))'
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
		$model=new Sections;
		$school = Yii::app()->user->getState('school_id');
		$classes = CHtml::listData(BaseModel::getAll('Classes',array("condition" => "school = '$school'")), 'id', 'class');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sections']))
		{
			$model->attributes=$_POST['Sections'];
			$model->school = $school;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'classes'=>$classes
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
		$school = Yii::app()->user->getState('school_id');
		$classes = CHtml::listData(BaseModel::getAll('Classes',array("condition" => "school = '$school'")),'id','class');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sections']))
		{
			$model->attributes=$_POST['Sections'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'classes'=>$classes
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->redirect(array('manage'));
	}

	/**
	 * Manages all models.
	 */
	public function actionManage()
	{
		$model=new Sections('search');
		$school = Yii::app()->user->getState('school_id');
		$classes = CHtml::listData(BaseModel::getAll('Classes',array("condition" => "school = '$school'")),'id','class');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sections']))
			$model->attributes=$_GET['Sections'];

		$this->render('admin',array(
			'model'=>$model,
			'classes'=>$classes
		));
	}

	public function actionPrevsections()
	{
		$class = $_POST['class'];
		$sections = Sections::model()->findAll(array("condition" => "class = '$class'",'order' => 'section ASC'));
		$html = "Previous Selected Sections: <b>";
		if($sections === null){
			$html = "No Section Selected for this class";
		} else {
			foreach($sections as $section){
				$html .= $section->section.', ';
			}
		}

		$html = rtrim($html);
		$html = substr($html,0,-1);
		echo $html."</b>";
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sections the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sections::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sections $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sections-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function className($data)
	{
		return Classes::model()->findByPk($data->class)->class;
	}
}
