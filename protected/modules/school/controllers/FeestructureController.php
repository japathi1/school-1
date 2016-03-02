<?php

class FeestructureController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/school_column2';

    protected function beforeAction($action) {
        if (Yii::app()->user->isGuest) {
            $this->redirect(array("/school/login"));
        }
        return parent::beforeAction($action);
    }

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
                //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'create', 'update', 'view', 'manage', 'delete'),
                'users' => array('@'),
                'expression' => '(isset($user->role) && ($user->role === "Principal"))||(isset($user->role) && ($user->role === "Account Manager"))'
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new FeeStructure;
        $school_id = Yii::app()->user->getState('school_id');
        $classes = CHtml::listData(BaseModel::getAll('Classes', array("condition" => "school = '$school_id'")), 'id', 'class');
        $fee_labels = CHtml::listData(BaseModel::getAll('FeeLabel', array("condition" => "school_id = '$school_id'")), 'id', 'fee_label');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['FeeStructure'])) {
            $model->attributes = $_POST['FeeStructure'];
            $model->school_id = $school_id;

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
            'classes' => $classes,
            'fee_labels' => $fee_labels,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

        $school_id = Yii::app()->user->getState('school_id');
        $classes = CHtml::listData(BaseModel::getAll('Classes', array("condition" => "school = '$school_id'")), 'id', 'class');
        $fee_labels = CHtml::listData(BaseModel::getAll('FeeLabel', array("condition" => "school_id = '$school_id'")), 'id', 'fee_label');

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['FeeStructure'])) {
            $model->attributes = $_POST['FeeStructure'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'classes' => $classes,
            'fee_labels' => $fee_labels,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->redirect(array('manage'));
    }

    /**
     * Manages all models.
     */
    public function actionManage() {
        $model = new FeeStructure('search');
        $school_id = Yii::app()->user->getState('school_id');
        $classes = CHtml::listData(BaseModel::getAll('Classes', array("condition" => "school = '$school_id'")), 'id', 'class');
        $fee_labels = CHtml::listData(BaseModel::getAll('FeeLabel', array("condition" => "school_id = '$school_id'")), 'id', 'fee_label');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['FeeStructure']))
            $model->attributes = $_GET['FeeStructure'];

        $this->render('admin', array(
            'model' => $model,
            'classes' => $classes,
            'fee_labels' => $fee_labels,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return FeeStructure the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = FeeStructure::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param FeeStructure $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'fee-structure-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function className($data) {
        return Classes::model()->findByPk($data->class_id)->class;
    }

    public function feeLabel($data) {
        return FeeLabel::model()->findByPk($data->fee_label_id)->fee_label;
    }

}
