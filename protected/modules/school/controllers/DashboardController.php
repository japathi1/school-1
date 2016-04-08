<?php

class DashboardController extends Controller {

    public $layout = '//layouts/school_column2';

    protected function beforeAction($action) {
        if (Yii::app()->user->isGuest) {
            $this->redirect(array("/school/login"));
        }
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        $school = Yii::app()->user->getState('school_id');
        $all_students = BaseModel::getAll('Transactions', array("condition" => "school = '$school'"));
        $data = [];
        $t_amount = 0;
        foreach ($all_students as $all) {
            $t_amount = $t_amount + $all->amount;
        }

        $np_students = BaseModel::getAll('Transactions', array("condition" => "school = '$school' AND payment_status = 'pending'"));
        $np_amount = 0;
        foreach ($np_students as $np) {
            $np_amount = $np_amount + $np->amount;
        }
        $d['value'] = $np_amount;
        $d['color'] = "#dd4b39";
        $d['highlight'] = "#dd4b39";
        $d['label'] = "Not Paid User";
        array_push($data, $d);
        $d = [];
        $p_students = BaseModel::getAll('Transactions', array("condition" => "school = '$school' AND payment_status = 'complete'"));
        $p_amount = 0;
        foreach ($p_students as $p) {
            $p_amount = $p_amount + $p->amount;
        }
        $d['value'] = $p_amount;
        $d['color'] = "#00a65a";
        $d['highlight'] = "#00a65a";
        $d['label'] = "Paid User";
        array_push($data, $d);
        $data = json_encode($data, true);

        // for graph work
        $month = date('m');
        $year = date('Y');
        $classes = BaseModel::getAll('Classes', array("condition" => "school = '$school'"));
        $data_array = array();
        foreach ($classes as $key => $class) {
            $paid_students = BaseModel::getAll('Transactions', array("condition" => "school = '$school' AND class = '$class->id' AND payment_status = 'complete' AND month ='$month' AND year = '$year' "));
            $not_paid_students = BaseModel::getAll('Transactions', array("condition" => "school = '$school' AND class = '$class->id' AND payment_status = 'pending' AND month ='$month' AND year = '$year'"));
            //if (!empty($paid_students) || !empty($not_paid_students)) {
            $paid_array = array();
            $paid_array[] = 'Paid';
            $paid_array[] = count($paid_students);

            $not_paid_array = array();

            $not_paid_array[] = 'Not Paid';
            $not_paid_array[] = count($not_paid_students);
            $data_array[$class->id]['data'] = array();
            $class_detail = Classes::model()->findByPk($class->id);
            $data_array[$class->id]['class_name'] = $class_detail->class;
            if (!empty(count($paid_students)) && !empty(count($not_paid_students))) {
                array_push($data_array[$class->id]['data'], $paid_array);
                array_push($data_array[$class->id]['data'], $not_paid_array);
            }
            // }
        }
        //pre($data_array, true);
        // end of graph work



        $this->render('index', array('all_students' => $all_students, 't_amount' => $t_amount,
            'np_students' => $np_students, 'np_amount' => $np_amount,
            'p_students' => $p_students, 'p_amount' => $p_amount, 'data' => $data, 'data_array' => $data_array));
    }

    public function actionChart() {
        $school = Yii::app()->user->getState('school_id');
        // for graph work
        $month = $_POST['month'];
        $year = $_POST['year'];
        $classes = BaseModel::getAll('Classes', array("condition" => "school = '$school'"));
        $data_array = array();
        foreach ($classes as $key => $class) {
            $paid_students = BaseModel::getAll('Transactions', array("condition" => "school = '$school' AND class = '$class->id' AND payment_status = 'complete' AND month ='$month' AND year = '$year' "));
            $not_paid_students = BaseModel::getAll('Transactions', array("condition" => "school = '$school' AND class = '$class->id' AND payment_status = 'pending' AND month ='$month' AND year = '$year'"));
            $paid_array = array();
            $paid_array[] = 'Paid';
            $paid_array[] = count($paid_students);

            $not_paid_array = array();

            $not_paid_array[] = 'Not Paid';
            $not_paid_array[] = count($not_paid_students);
            $data_array[$class->id]['data'] = array();
            $class_detail = Classes::model()->findByPk($class->id);
            $data_array[$class->id]['class_name'] = $class_detail->class;
             if (!empty(count($paid_students)) && !empty(count($not_paid_students))) {
                array_push($data_array[$class->id]['data'], $paid_array);
                array_push($data_array[$class->id]['data'], $not_paid_array);
            }
        }

        echo json_encode($data_array);
        // end of graph work
    }

}
