<?php

class TransactionsController extends Controller
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
                'actions' => array('index', 'update', 'view', 'manage', 'delete','sections', 'students','sendsms'),
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
		$model=new Transactions('search');
		$school = Yii::app()->user->getState('school_id');
		$classes = CHtml::listData(BaseModel::getAll('Classes', array("condition" => "school = '$school'")), 'id', 'class');
		
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Transactions']))
			$model->attributes=$_GET['Transactions'];

		$this->render('admin',array(
			'model'=>$model,
			'classes'=>$classes
		));
	}

	public function actionSections() {
        $class = $_POST['class'];
        $sections = Sections::model()->findAll(array("condition" => "class = '$class'", 'order' => 'section ASC'));
        $html = "<option>Select Section</option>";
        if ($sections !== null) {
            foreach ($sections as $section) {
                $html .= "<option value='" . $section->id . "''>" . $section->section . "</option>";
            }
        }

        echo $html;
    }

    public function actionStudents() {
        $section = $_POST['section'];
        $students = Students::model()->findAll(array("condition" => "section = '$section'", 'order' => 'section ASC'));
        $html = "<option>Select Student</option>";
        if ($students !== null) {
            foreach ($students as $student) {
                $html .= "<option value='" . $student->id . "''>" . $student->firstname.' '.$student->middlename.' '.$student->lastname.'(Roll: '.$student->roll_number.')'. "</option>";
            }
        }

        echo $html;
    }

    public function actionSendsms($id)
    {
    	$transaction = Transactions::model()->findByPk($id);
    	$student = Students::model()->findByPk($transaction->student);
    	$name = $student->firstname.' '.$student->middlename.' '.$student->lastname;
        $roll = $student->roll_number;
        $school_detail = Schools::model()->findByPk($student->school);
        $parent = Parents::model()->find(array("condition" => "child = '$student->id' AND parent_type = 'father'"));
        $url = domainUrl()."/school/receipt/view?id=".$transaction->id;
        if($parent === null){
            $message = "Dear Parent,
                    Fees For Your Child $name For $transaction->month/$transaction->year Month is Pending, Make Payment Now to avoid Late Fee & Other  Frustrations like standing in Queue ,Traveling. Click Link $url";
        } else {
            $message = "Dear $parent->firstname $parent->lastname,
                    Fees For Your Child $name For $transaction->month/$transaction->year Month is Pending, Make Payment Now to avoid Late Fee & Other  Frustrations like standing in Queue ,Traveling. Click Link $url";
        }
        sendSmS($student->emg_contact,$message);
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Transactions the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Transactions::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Transactions $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='transactions-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function studentName($data)
	{
		$student = Students::model()->findByPk($data->student);
		return $student->firstname.' '.$student->middlename.' '.$student->lastname;
	}

	protected function className($data)
	{
		return Classes::model()->findByPk($data->class)->class;
	}

	protected function sectionName($data)
	{
		return Sections::model()->findByPk($data->section)->section;
	}

	protected function monthName($data)
	{
		$months = getParam('months');
		return $months[$data->month];
	}
}
