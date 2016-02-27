<?php

/**
 * This is the model class for table "transactions".
 *
 * The followings are the available columns in table 'transactions':
 * @property string $id
 * @property string $school
 * @property string $student
 * @property string $class
 * @property string $section
 * @property string $receipt
 * @property string $transaction_id
 * @property string $transaction_type
 * @property string $amount
 * @property integer $month
 * @property integer $year
 * @property string $payment_status
 * @property integer $status
 * @property integer $deleted
 * @property string $created_by
 * @property string $modified_by
 * @property string $date_entered
 * @property string $date_modified
 */
class Transactions extends AdminBaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transactions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, school, student, class, section, receipt, transaction_type, amount, month, year, payment_status, created_by, modified_by, date_entered, date_modified', 'required'),
			array('month, year, status, deleted', 'numerical', 'integerOnly'=>true),
			array('id, school, student, class, section, receipt, created_by, modified_by', 'length', 'max'=>36),
			array('transaction_id', 'length', 'max'=>128),
			array('transaction_type', 'length', 'max'=>6),
			array('amount', 'length', 'max'=>16),
			array('payment_status', 'length', 'max'=>9),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, school, student, class, section, receipt, transaction_id, transaction_type, amount, month, year, payment_status, status, deleted, created_by, modified_by, date_entered, date_modified', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'school' => 'School',
			'student' => 'Student',
			'class' => 'Class',
			'section' => 'Section',
			'receipt' => 'Receipt',
			'transaction_id' => 'Transaction',
			'transaction_type' => 'Transaction Type',
			'amount' => 'Amount',
			'month' => 'Month',
			'year' => 'Year',
			'payment_status' => 'Payment Status',
			'status' => 'Status',
			'deleted' => 'Deleted',
			'created_by' => 'Created By',
			'modified_by' => 'Modified By',
			'date_entered' => 'Date Entered',
			'date_modified' => 'Date Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('student',$this->student,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('section',$this->section,true);
		$criteria->compare('receipt',$this->receipt,true);
		$criteria->compare('transaction_id',$this->transaction_id,true);
		$criteria->compare('transaction_type',$this->transaction_type,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);
		$criteria->compare('payment_status',$this->payment_status,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('modified_by',$this->modified_by,true);
		$criteria->compare('date_entered',$this->date_entered,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transactions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
