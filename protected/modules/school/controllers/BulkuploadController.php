<?php

class BulkuploadController extends Controller {

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
                'actions' => array('index', 'sections'),
                'users' => array('@'),
                'expression' => '(isset($user->role) && ($user->role === "Principal"))||(isset($user->role) && ($user->role === "Account Manager"))'
            ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$model = new BulkUpload;
		$school = Yii::app()->user->getState('school_id');
		$classes = CHtml::listData(BaseModel::getAll('Classes', array("condition" => "school = '$school'")), 'id', 'class');
		if(isset($_POST['BulkUpload'])){
			$model->attributes=$_POST['BulkUpload'];
            $model->excelFile = CUploadedFile::getInstance($model,'excelFile');
            if($model->validate())
            {
                $model->excelFile->saveAs('assets/bulk-upload/students.xls');
                $data = new Spreadsheet_Excel_Reader("assets/bulk-upload/students.xls");
                // $data->dump(true,true);
                
                for($i=0;$i<count($data->sheets);$i++) //get all sheets in a file.
				{
					if(count($data->sheets[$i][cells])>0) // checking sheet not empty
					{
						for($j=2;$j<=count($data->sheets[$i][cells]);$j++) //each row of the sheet
						{
							for($k=1;$k<=count($data->sheets[$i][cells][$j]);$k++) //get data in a table format.
							{
								echo $data->sheets[$i][cells][$j][$k].'<br/>';
							}
						}
					}
				}
            }
		}
		$this->render('index',array('model'=>$model,'classes' => $classes));
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