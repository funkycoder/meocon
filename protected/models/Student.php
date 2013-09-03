<?php

/**
 * This is the model class for table "tbl_student".
 *
 * The followings are the available columns in table 'tbl_student':
 * @property string $id
 * @property string $fullname
 * @property string $dob
 * @property integer $sex
 * @property integer $totalsiblings
 * @property integer $siblingorder
 * @property string $address_id
 * @property integer $mobilephone
 * @property string $father_id
 * @property string $mother_id
 * @property string $class_id
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property Measurement[] $measurements
 * @property Address $address
 * @property Class $class
 * @property User $createUser
 * @property User $updateUser
 * @property Contact $father
 * @property Contact $mother
 * @property Contact[] $tblContacts
 * @property Staff[] $tblStaffs
 * @property StudentStudent[] $studentStudents
 * @property StudentStudent[] $studentStudents1
 */
class Student extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fullname, dob, sex, totalsiblings, siblingorder', 'required'),
			array('sex, totalsiblings, siblingorder, mobilephone', 'numerical', 'integerOnly'=>true),
			array('fullname', 'length', 'max'=>255),
			array('address_id, father_id, mother_id, class_id, create_user_id, update_user_id', 'length', 'max'=>11),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fullname, dob, sex, totalsiblings, siblingorder, address_id, mobilephone, father_id, mother_id, class_id, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'measurements' => array(self::HAS_MANY, 'Measurement', 'student_id'),
			'address' => array(self::BELONGS_TO, 'Address', 'address_id'),
			'class' => array(self::BELONGS_TO, 'Class', 'class_id'),
			'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
			'updateUser' => array(self::BELONGS_TO, 'User', 'update_user_id'),
			'father' => array(self::BELONGS_TO, 'Contact', 'father_id'),
			'mother' => array(self::BELONGS_TO, 'Contact', 'mother_id'),
			'tblContacts' => array(self::MANY_MANY, 'Contact', 'tbl_student_contact(student_id, contact_id)'),
			'tblStaffs' => array(self::MANY_MANY, 'Staff', 'tbl_student_staff(student_id, staff_id)'),
			'studentStudents' => array(self::HAS_MANY, 'StudentStudent', 'student2_id'),
			'studentStudents1' => array(self::HAS_MANY, 'StudentStudent', 'student1_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fullname' => 'Fullname',
			'dob' => 'Dob',
			'sex' => 'Sex',
			'totalsiblings' => 'Totalsiblings',
			'siblingorder' => 'Siblingorder',
			'address_id' => 'Address',
			'mobilephone' => 'Mobilephone',
			'father_id' => 'Father',
			'mother_id' => 'Mother',
			'class_id' => 'Class',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('totalsiblings',$this->totalsiblings);
		$criteria->compare('siblingorder',$this->siblingorder);
		$criteria->compare('address_id',$this->address_id,true);
		$criteria->compare('mobilephone',$this->mobilephone);
		$criteria->compare('father_id',$this->father_id,true);
		$criteria->compare('mother_id',$this->mother_id,true);
		$criteria->compare('class_id',$this->class_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}