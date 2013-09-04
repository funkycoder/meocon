<?php

/**
 * This is the model class for table "tbl_staff".
 *
 * The followings are the available columns in table 'tbl_staff':
 * @property string $id
 * @property string $fullname
 * @property string $dob
 * @property integer $sex
 * @property integer $jobtype
 * @property string $email
 * @property string $mobilephone
 * @property string $address_id
 * @property string $class_id
 * @property string $notes
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property User $updateUser
 * @property Address $address
 * @property Class $class
 * @property User $createUser
 * @property Student[] $tblStudents
 */
class Staff extends CActiveRecord {
    //Define sex

    const SEX_MALE = 0;
    const SEX_FEMALE = 1;

    /**
     * @return array list of possible sex type
     */
    public function getSexOptions() {
        return array(self::SEX_FEMALE => 'Nữ', self::SEX_MALE => 'Nam');
    }

    /**
     * @return array of allowed sex type
     */
    public function getAllowedSexType() {
        return array(self::SEX_FEMALE, self::SEX_MALE);
    }

    /**
     * @ return string get text value for sex
     */
    public function getSexText() {
        $sexOptions = $this->sexOptions; //magic function
        return isset($sexOptions[$this->sex]) ? $sexOptions[$this->sex] : 'Dữ liệu trống.';
    }

    /**
     * @ return string get text value for sex
     */
    public function getClassName() {
        return isset($this->class) ? CHtml::encode($this->class->name) : "Dữ liệu trống";
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Staff the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_staff';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fullname, dob, sex, jobtype, mobilephone', 'required'),
            array('sex, jobtype', 'numerical', 'integerOnly' => true),
            array('fullname, email, notes', 'length', 'max' => 255),
            array('mobilephone, address_id, class_id, create_user_id, update_user_id', 'length', 'max' => 11),
            array('create_time, update_time', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, fullname, dob, sex, jobtype, email, mobilephone, address_id, class_id, notes, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'updateUser' => array(self::BELONGS_TO, 'User', 'update_user_id'),
            'address' => array(self::BELONGS_TO, 'Address', 'address_id'),
            'class' => array(self::BELONGS_TO, 'ClassRoom', 'class_id'),
            'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
            'tblStudents' => array(self::MANY_MANY, 'Student', 'tbl_student_staff(staff_id, student_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Mã số nhân viên',
            'fullname' => 'Họ và tên',
            'dob' => 'Ngày sinh',
            'sex' => 'Giới',
            'jobtype' => 'Công việc',
            'email' => 'Email',
            'mobilephone' => 'Di động',
            'address_id' => 'Địa chỉ',
            'class_id' => 'Mã số lớp',
            'notes' => 'Ghi chú',
            'create_time' => 'Khởi tạo',
            'create_user_id' => 'Người tạo',
            'update_time' => 'Cập nhật',
            'update_user_id' => 'Người cập nhật',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('fullname', $this->fullname, true);
        $criteria->compare('dob', $this->dob, true);
        $criteria->compare('sex', $this->sex);
        $criteria->compare('jobtype', $this->jobtype);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('mobilephone', $this->mobilephone, true);
        $criteria->compare('address_id', $this->address_id, true);
        $criteria->compare('class_id', $this->class_id, true);
        $criteria->compare('notes', $this->notes, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}