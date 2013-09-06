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

    const JOB_TEACHER = 0;
    const JOB_HELPER = 1;
    const JOB_SECURITY = 2;
    const JOB_COOK = 3;
    const JOB_MAID = 4;
    const JOB_PRINCIPAL = 5;
    const JOB_VICE_PRINCIPAL = 6;
    const JOB_CHAIRWOMAN = 7;

    /**
     * @return array list of possible job type
     */
    public function getJobOptions() {
        return array(self::JOB_TEACHER => 'Giáo viên',
            self::JOB_HELPER => 'Bảo mẫu',
            self::JOB_SECURITY => 'Bảo vệ',
            self::JOB_COOK => 'Nấu bếp',
            self::JOB_MAID => 'Tạp vụ',
            self::JOB_PRINCIPAL => 'Hiệu trưởng',
            self::JOB_VICE_PRINCIPAL => 'Hiệu phó',
            self::JOB_CHAIRWOMAN => 'HĐQT');
    }

    /**
     * @return array of allowed job type
     */
    public function getAllowedJobType() {
        return array(self::JOB_TEACHER, self::JOB_HELPER, self::JOB_SECURITY, self::JOB_COOK,
            self::JOB_MAID, self::JOB_PRINCIPAL, self::JOB_VICE_PRINCIPAL, self::JOB_CHAIRWOMAN);
    }

    /**
     * @ return string get text value for sex_type
     */
    public function getJobText() {
        $jobOptions = self::getJobOptions(); //magic function
        return isset($jobOptions[$this->jobtype]) ? $jobOptions[$this->jobtype] : 'Dữ liệu trống.';
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
             //CRangeValidator :
            array('sex','in','range'=>  ModelHelper::getAllowedSexType()),
            array('jobtype','in','range'=>  self::getAllowedJobType()),
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
            'classRoom' => array(self::BELONGS_TO, 'ClassRoom', 'class_id'),
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