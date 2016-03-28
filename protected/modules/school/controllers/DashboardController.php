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
		$school = Yii::app()->user->getState('school_id');
		$all_students = BaseModel::getAll('Transactions',array("condition" => "school = '$school'"));
		$data = [];
		$t_amount = 0;
		foreach($all_students as $all){
			$t_amount = $t_amount + $all->amount;
		}

		$np_students = BaseModel::getAll('Transactions',array("condition" => "school = '$school' AND payment_status = 'pending'"));
		$np_amount = 0;
		foreach($np_students as $np){
			$np_amount = $np_amount + $np->amount;
		}
		$d['value'] = $np_amount;
		$d['color'] = "#dd4b39";
		$d['highlight'] = "#dd4b39";
		$d['label'] = "Not Paid User";
		array_push($data, $d);
		$d = [];
		$p_students = BaseModel::getAll('Transactions',array("condition" => "school = '$school' AND payment_status = 'complete'"));
		$p_amount = 0;
		foreach($p_students as $p){
			$p_amount = $p_amount + $p->amount;
		}
		$d['value'] = $p_amount;
		$d['color'] = "#00a65a";
		$d['highlight'] = "#00a65a";
		$d['label'] = "Paid User";
		array_push($data, $d);
		$data = json_encode($data, true);
		$this->render('index',array('all_students' => $all_students,'t_amount' => $t_amount,
									'np_students' => $np_students, 'np_amount' => $np_amount,
									'p_students' => $p_students, 'p_amount' => $p_amount,'data' => $data));
	}
}