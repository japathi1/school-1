<?php

/**
 * This is the model class for table "format".
 *
 * The followings are the available columns in table 'format':
 * @property integer $id
 * @property string $school_id
 * @property string $school_slug
 * @property integer $year
 * @property integer $receipt_no
 */
class Format extends SimpleModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'format';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('school_id, school_slug, year, receipt_no', 'required'),
			array('year, receipt_no', 'numerical', 'integerOnly'=>true),
			array('school_id', 'length', 'max'=>36),
			array('school_slug', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, school_id, school_slug, year, receipt_no', 'safe', 'on'=>'search'),
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
			'school_id' => 'School',
			'school_slug' => 'School Slug',
			'year' => 'Year',
			'receipt_no' => 'Receipt No',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('school_id',$this->school_id,true);
		$criteria->compare('school_slug',$this->school_slug,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('receipt_no',$this->receipt_no);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Format the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
