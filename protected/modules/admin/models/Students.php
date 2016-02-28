<?php

/**
 * This is the model class for table "students".
 *
 * The followings are the available columns in table 'students':
 * @property string $id
 * @property string $school
 * @property integer $roll_number
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $class
 * @property string $section
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $city
 * @property string $state
 * @property string $pin
 * @property string $emg_contact
 * @property integer $status
 * @property integer $deleted
 * @property string $date_entered
 * @property string $date_modified
 * @property string $created_by
 * @property string $modified_by
 */
class Students extends AdminBaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'students';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, school, roll_number, firstname, lastname, class, section, address_line_1, city, state, pin, emg_contact, date_entered, date_modified, created_by, modified_by', 'required'),
			array('roll_number, status, deleted', 'numerical', 'integerOnly'=>true),
			array('id, school, class, section, state, created_by, modified_by', 'length', 'max'=>36),
			array('firstname, middlename, lastname, city', 'length', 'max'=>128),
			array('address_line_1, address_line_2', 'length', 'max'=>255),
			array('pin', 'length', 'max'=>6),
			array('emg_contact', 'length', 'max'=>16),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, school, roll_number, firstname, middlename, lastname, class, section, address_line_1, address_line_2, city, state, pin, emg_contact, status, deleted, date_entered, date_modified, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'roll_number' => 'Roll Number',
			'firstname' => 'Firstname',
			'middlename' => 'Middlename',
			'lastname' => 'Lastname',
			'class' => 'Class',
			'section' => 'Section',
			'address_line_1' => 'Address Line 1',
			'address_line_2' => 'Address Line 2',
			'city' => 'City',
			'state' => 'State',
			'pin' => 'Pin',
			'emg_contact' => 'Emg Contact',
			'status' => 'Status',
			'deleted' => 'Deleted',
			'date_entered' => 'Date Entered',
			'date_modified' => 'Date Modified',
			'created_by' => 'Created By',
			'modified_by' => 'Modified By',
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
		$criteria->compare('roll_number',$this->roll_number);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('middlename',$this->middlename,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('section',$this->section,true);
		$criteria->compare('address_line_1',$this->address_line_1,true);
		$criteria->compare('address_line_2',$this->address_line_2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('pin',$this->pin,true);
		$criteria->compare('emg_contact',$this->emg_contact,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('date_entered',$this->date_entered,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('modified_by',$this->modified_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Students the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
