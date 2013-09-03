<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $last_login_time
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property Address[] $addresses
 * @property Address[] $addresses1
 * @property Class[] $classes
 * @property Class[] $classes1
 * @property Contact[] $contacts
 * @property Contact[] $contacts1
 * @property Measurement[] $measurements
 * @property Measurement[] $measurements1
 * @property Staff[] $staffs
 * @property Staff[] $staffs1
 * @property Student[] $students
 * @property Student[] $students1
 * @property User $updateUser
 * @property User[] $users
 * @property User $createUser
 * @property User[] $users1
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, password', 'required'),
			array('username, email, password', 'length', 'max'=>255),
			array('create_user_id, update_user_id', 'length', 'max'=>11),
			array('last_login_time, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, email, password, last_login_time, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'addresses' => array(self::HAS_MANY, 'Address', 'update_user_id'),
			'addresses1' => array(self::HAS_MANY, 'Address', 'create_user_id'),
			'classes' => array(self::HAS_MANY, 'Class', 'update_user_id'),
			'classes1' => array(self::HAS_MANY, 'Class', 'create_user_id'),
			'contacts' => array(self::HAS_MANY, 'Contact', 'update_user_id'),
			'contacts1' => array(self::HAS_MANY, 'Contact', 'create_user_id'),
			'measurements' => array(self::HAS_MANY, 'Measurement', 'update_user_id'),
			'measurements1' => array(self::HAS_MANY, 'Measurement', 'create_user_id'),
			'staffs' => array(self::HAS_MANY, 'Staff', 'update_user_id'),
			'staffs1' => array(self::HAS_MANY, 'Staff', 'create_user_id'),
			'students' => array(self::HAS_MANY, 'Student', 'create_user_id'),
			'students1' => array(self::HAS_MANY, 'Student', 'update_user_id'),
			'updateUser' => array(self::BELONGS_TO, 'User', 'update_user_id'),
			'users' => array(self::HAS_MANY, 'User', 'update_user_id'),
			'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
			'users1' => array(self::HAS_MANY, 'User', 'create_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'last_login_time' => 'Last Login Time',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}