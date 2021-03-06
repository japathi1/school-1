<?php

class SchoolsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'manage', 'delete'),
                'users' => array('*'),
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

    protected function beforeAction($action) {
        if (!isFrontUserLoggedIn()) {
            $this->redirect(array("/admin/login"));
        }
        return parent::beforeAction($action);
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
        $model = new Schools;
        $states = CHtml::listData(BaseModel::getAll('States'), 'id', 'state');
        $roles = CHtml::listData(BaseModel::getAll('Roles'), 'id', 'role');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Schools'])) {
            $model->attributes = $_POST['Schools'];
            // pre($_FILES,true);
            if(isset($_FILES['Schools'])){
                $name = $_FILES['Schools']['name']['school_logo'];
                $tmp_name = $_FILES['Schools']['tmp_name']['school_logo'];
                $type = $_FILES['Schools']['type']['school_logo'];
                $logo = uploadImage($name, $type, $tmp_name, 'school-logo');
            }
            $model->school_logo = $logo;
            if ($model->save()) {
                $school_id = $model->id;
                $school = Schools::model()->find(array("condition" => "id = '$school_id'"));
                $school_arr = explode(' ', strtoupper($school->name));
                $slug = '';
                foreach ($school_arr as $school) {
                    $slug = $slug . substr($school, 0, 1);
                }

                $year = date('y');
                for ($i = 0; $i <= 10; $i++) {
                    $format = new Format;
                    $format->school_id = $school_id;
                    $format->school_slug = $slug;
                    $format->year = $year;
                    $format->receipt_no = 0;
                    $format->save();
                    $year++;
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'states' => $states,
            'roles' => $roles
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $states = CHtml::listData(BaseModel::getAll('States'), 'id', 'state');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Schools'])) {
            $model->attributes = $_POST['Schools'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'states' => $states
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $model->deleted = 1;
        $model->save();
        /* $users = BaseModel::getAll('Users',arrray('condition' => 'school_id = '.$id.''));
          foreach($users as $user){
          $user->deleted = 1;
          $user->save();
          } */

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
        $model = new Schools('search');
        $states = CHtml::listData(BaseModel::getAll('States'), 'id', 'state');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Schools']))
            $model->attributes = $_GET['Schools'];

        $this->render('admin', array(
            'model' => $model,
            'states' => $states
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Schools the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Schools::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Schools $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'schools-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function gridState($data) {
        return States::model()->findByPk($data->state)->state;
    }

}
