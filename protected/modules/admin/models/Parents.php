<?php

/**
 * This is the model class for table "student_parent".
 *
 * The followings are the available columns in table 'student_parent':
 * @property string $id
 * @property string $school
 * @property string $child
 * @property string $firstname
 * @property string $lastname
 * @property string $type
 * @property string $parent_type
 * @property string $email
 * @property string $contact
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $city
 * @property string $state
 * @property string $pincode
 * @property integer $status
 * @property integer $deleted
 * @property string $date_entered
 * @property string $date_modified
 * @property string $created_by
 * @property string $modified_by
 */
class Parents extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student_parent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, school, child, firstname, lastname, email, contact, address_line_1, city, state, pincode, date_entered, date_modified, created_by, modified_by', 'required'),
			array('status, deleted', 'numerical', 'integerOnly'=>true),
			array('id, school, child, state, created_by, modified_by', 'length', 'max'=>36),
			array('firstname, lastname, email, contact', 'length', 'max'=>128),
			array('type', 'length', 'max'=>7),
			array('parent_type', 'length', 'max'=>8),
			array('address_line_1, address_line_2, city', 'length', 'max'=>255),
			array('pincode', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, school, child, firstname, lastname, type, parent_type, email, contact, address_line_1, address_line_2, city, state, pincode, status, deleted, date_entered, date_modified, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'child' => 'Child',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'type' => 'Type',
			'parent_type' => 'Parent Type',
			'email' => 'Email',
			'contact' => 'Contact',
			'address_line_1' => 'Address Line 1',
			'address_line_2' => 'Address Line 2',
			'city' => 'City',
			'state' => 'State',
			'pincode' => 'Pincode',
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
		$criteria->compare('child',$this->child,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('parent_type',$this->parent_type,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('address_line_1',$this->address_line_1,true);
		$criteria->compare('address_line_2',$this->address_line_2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('pincode',$this->pincode,true);
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
	 * @return Parents the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
