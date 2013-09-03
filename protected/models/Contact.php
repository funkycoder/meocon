<?php

/**
 * This is the model class for table "tbl_contact".
 *
 * The followings are the available columns in table 'tbl_contact':
 * @property string $id
 * @property string $fullname
 * @property string $jobname
 * @property integer $jobtype
 * @property integer $educationlevel
 * @property string $email
 * @property string $mobilephone
 * @property string $notes
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property User $updateUser
 * @property User $createUser
 * @property Address[] $tblAddresses
 * @property Student[] $students
 * @property Student[] $students1
 * @property Student[] $tblStudents
 */
class Contact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contact the static model class
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
		return 'tbl_contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fullname, jobname, jobtype, educationlevel, mobilephone', 'required'),
			array('jobtype, educationlevel', 'numerical', 'integerOnly'=>true),
			array('fullname, jobname, email, notes', 'length', 'max'=>255),
			array('mobilephone, create_user_id, update_user_id', 'length', 'max'=>11),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fullname, jobname, jobtype, educationlevel, email, mobilephone, notes, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'updateUser' => array(self::BELONGS_TO, 'User', 'update_user_id'),
			'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
			'tblAddresses' => array(self::MANY_MANY, 'Address', 'tbl_contact_address(contact_id, address_id)'),
			'students' => array(self::HAS_MANY, 'Student', 'father_id'),
			'students1' => array(self::HAS_MANY, 'Student', 'mother_id'),
			'tblStudents' => array(self::MANY_MANY, 'Student', 'tbl_student_contact(contact_id, student_id)'),
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
			'jobname' => 'Jobname',
			'jobtype' => 'Jobtype',
			'educationlevel' => 'Educationlevel',
			'email' => 'Email',
			'mobilephone' => 'Mobilephone',
			'notes' => 'Notes',
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
		$criteria->compare('jobname',$this->jobname,true);
		$criteria->compare('jobtype',$this->jobtype);
		$criteria->compare('educationlevel',$this->educationlevel);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('mobilephone',$this->mobilephone,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}