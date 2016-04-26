<?php

class BulkuploadController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/school_column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'sections'),
                'users' => array('@'),
                'expression' => '(isset($user->role) && ($user->role === "Principal"))||(isset($user->role) && ($user->role === "Account Manager"))'
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        require('./assets/excelreader/php-excel-reader/excel_reader2.php');
        require('./assets/excelreader/SpreadsheetReader.php');

        date_default_timezone_set('UTC');

        $model = new BulkUpload;
        $school = Yii::app()->user->getState('school_id');
        $classes = CHtml::listData(BaseModel::getAll('Classes', array("condition" => "school = '$school'")), 'id', 'class');
        if (isset($_POST['BulkUpload'])) {
            $model->attributes = $_POST['BulkUpload'];
            $model->excelFile = CUploadedFile::getInstance($model, 'excelFile');
            if ($model->validate()) {
                $rand = rand();
                $model->excelFile->saveAs('assets/bulk-upload/' . $rand . '.xls');
                try {
                    $data = new Spreadsheet_Excel_Reader("assets/bulk-upload/" . $rand . ".xls");

                    for ($i = 0; $i < count($data->sheets); $i++) {
                        if (count($data->sheets[$i]['cells']) > 0) {
                            for ($j = 2; $j <= count($data->sheets[$i]['cells']); $j++) {
                                $row = $data->sheets[$i]['cells'][$j];
                                $student = new Students;
                                $student->school = $school;
                                $student->class = $model->class;
                                $student->section = $model->section;
                                $student->firstname = $row['1'];
                                if (isset($row['2'])) {
                                    $student->middlename = $row['2'];
                                }

                                $student->lastname = $row['3'];
                                $student->roll_number = $row['4'];
                                $student->address_line_1 = $row['5'];
                                $student->address_line_2 = $row['6'];
                                $student->city = $row['7'];
                                $state = $row['8'];
                                $state_check = States::model()->find(array('condition' => "state = '$state'"));
                                if ($state_check !== null) {
                                    $state = $state_check->id;
                                } else {
                                    $states = new States;
                                    $states->state = $state;
                                    $states->save();
                                    $state = $states->id;
                                }
                                $student->state = $state;
                                $student->pin = $row['9'];
                                $student->emg_contact = $row['10'];
                                $student->save();

                                $parent = new Parents;
                                $parent->school = $school;
                                $parent->child = $student->id;
                                $parent->firstname = $row['11'];
                                if (isset($row['12'])) {
                                    $parent->middlename = $row['12'];
                                }
                                // $parent->middlename = $row['12'];
                                $parent->lastname = $row['13'];
                                $parent->address_line_1 = $row['5'];
                                $parent->address_line_2 = $row['6'];
                                $parent->city = $row['7'];
                                $parent->state = $state;
                                $parent->pincode = $row['9'];
                                $parent->email = $row['15'];
                                $parent->contact = $row['14'];
                                $parent->parent_type = strtolower($row['16']);
                                $parent->save();
                            }
                        }
                    }
                } catch (Exception $E) {
                    echo $E->getMessage();
                }
                unlink("assets/bulk-upload/" . $rand . ".xls");
                $this->redirect(array("students/manage"));
            }
        }
        $this->render('index', array('model' => $model, 'classes' => $classes));
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

}

?>