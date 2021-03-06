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
 * @property string $homeaddress
 * @property string $homephone
 * @property string $class_id
 * @property string $notes
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property User $updateUser
 * @property Class $class
 * @property User $createUser
 * @property Student[] $students
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
     * To display datetime property in one format and store it in a different format
     * 
     * Source: http://stackoverflow.com/questions/6811706/yii-how-to-change-datetime-format-displayed-on-the-view
     * Version : 1.0
     * Date : 07/09/2013
     * Modified date: 
     * Modified by :
     * Reason:  
     * Documents  Customization CActiveRecord provides a few placeholder methods that can be overridden in child classes to customize its workflow.
      beforeValidate and afterValidate: these are invoked before and after validation is performed.
      beforeSave and afterSave: these are invoked before and after saving an AR instance.
      beforeDelete and afterDelete: these are invoked before and after an AR instance is deleted.
      afterConstruct: this is invoked for every AR instance created using the new operator.
      beforeFind: this is invoked before an AR finder is used to perform a query (e.g. find(), findAll()).
      afterFind: this is invoked after every AR instance created as a result of query.
     */
    protected function afterFind() {
        // convert to display format
        $this->dob = strtotime($this->dob);
        $this->dob = date('d-m-Y', $this->dob);

        parent::afterFind();
    }

    protected function beforeValidate() {
        // convert to storage format
        $this->dob = strtotime($this->dob);
        $this->dob = date('Y-m-d', $this->dob);

        return parent::beforeValidate();
    }

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
    public static function getAllowedJobType() {
        return array(self::JOB_TEACHER, self::JOB_HELPER, self::JOB_SECURITY, self::JOB_COOK,
            self::JOB_MAID, self::JOB_PRINCIPAL, self::JOB_VICE_PRINCIPAL, self::JOB_CHAIRWOMAN);
    }

    /**
     * @ return string get text value for sex_type
     */
    public function getJobText() {
        $jobOptions = self::getJobOptions();
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
            array('fullname, dob, sex, jobtype, mobilephone,homeaddress', 'required'),
            array('sex, jobtype', 'numerical', 'integerOnly' => true),
            array('fullname, homeaddress,email, notes', 'length', 'max' => 255),
            array('mobilephone,homephone, class_id, create_user_id, update_user_id', 'length', 'max' => 11),
            array('create_time, update_time', 'safe'),
            //CRangeValidator :
            array('sex', 'in', 'range' => ModelHelper::getAllowedSexType()),
            array('jobtype', 'in', 'range' => self::getAllowedJobType()),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, fullname, dob, sex, jobtype, email, mobilephone, homeaddress,homephone, class_id, notes, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
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
            'classRoom' => array(self::BELONGS_TO, 'ClassRoom', 'class_id'),
            'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
            'students' => array(self::MANY_MANY, 'Student', 'tbl_student_staff(staff_id, student_id)'),
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
            'mobilephone' => 'ĐT di động',
            'homeaddress' => 'Địa chỉ nhà',
            'homephone' => 'ĐT nhà',
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
        $criteria->compare('homeaddress', $this->homeaddress, true);
        $criteria->compare('homephone', $this->homephone, true);
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