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
 * @property integer $mobilephone
 * @property string $homeaddress
 * @property string $homephone
 * @property string $class_id
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property Measurement[] $measurements
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
class Student extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Student the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_student';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fullname, dob, sex, totalsiblings, siblingorder,mobilephone,homeaddress,homephone', 'required'),
            array('sex, totalsiblings, siblingorder, mobilephone', 'numerical', 'integerOnly' => true),
            array('fullname,homeaddress', 'length', 'max' => 255),
            array('class_id, create_user_id, update_user_id', 'length', 'max' => 11),
            array('create_time, update_time', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, fullname, dob, sex, totalsiblings, siblingorder, mobilephone,homeaddress,homephone, class_id, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'measurements' => array(self::HAS_MANY, 'Measurement', 'student_id'),
            'classRoom' => array(self::BELONGS_TO, 'ClassRoom', 'class_id'),
            'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
            'updateUser' => array(self::BELONGS_TO, 'User', 'update_user_id'),
            'relatives' => array(self::MANY_MANY, 'Contact', 'tbl_student_contact(student_id, contact_id)'),
            'staffs' => array(self::MANY_MANY, 'Staff', 'tbl_student_staff(student_id, staff_id)'),
            'students' => array(self::HAS_MANY, 'StudentStudent', 'student_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Mã số học sinh',
            'fullname' => 'Họ và tên',
            'dob' => 'Ngày sinh',
            'sex' => 'Giới',
            'totalsiblings' => 'Số anh chị em',
            'siblingorder' => 'Con thứ',
            'mobilephone' => 'ĐT di động',
            'homeaddress' => 'Địa chỉ nhà',
            'homephone' => 'ĐT nhà',
            'class_id' => 'Lớp',
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
        $criteria->compare('mobilephone', $this->mobilephone);
        $criteria->compare('homeaddress', $this->homeaddress, true);
        $criteria->compare('homephone', $this->homephone, true);
        $criteria->compare('class_id', $this->class_id, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}