<?php

/**
 * This is the model class for table "tbl_contact".
 *
 * The followings are the available columns in table 'tbl_contact':
 * @property string $id
 * @property string $fullname
 * @property string $jobname
 * @property integer $educationlevel
 * @property string $email
 * @property string $website
 * @property string $mobilephone
 * @property string $workaddress
 * @property string $workphone
 * @property string $notes
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property User $createUser
 * @property User $updateUser
 * @property Student[] $tblStudents
 */
class Contact extends CActiveRecord {
    //Define edu level

    const EDU_LEVEL_UNKNOWN = 0;
    const EDU_LEVEL_1 = 1;
    const EDU_LEVEL_2 = 2;
    const EDU_LEVEL_3 = 3;
    const EDU_LEVEL_UNI = 4;
    const EDU_LEVEL_DOC = 5;

    /**
     * @return array list of possible education level
     */
    public function getEduLevelOptions() {
        return array(self::EDU_LEVEL_UNKNOWN => 'Không rõ',
            self::EDU_LEVEL_1 => 'Cấp 1',
            self::EDU_LEVEL_2 => 'Cấp 2',
            self::EDU_LEVEL_3 => 'Cấp 3',
            self::EDU_LEVEL_UNI => 'Đại học',
            self::EDU_LEVEL_DOC => 'Trên đại học');
    }

    /**
     * @return array list of allowed education level
     */
    public static function getAllowedEduLevel() {
        return array(self::EDU_LEVEL_UNKNOWN, self::EDU_LEVEL_1, self::EDU_LEVEL_2, self::EDU_LEVEL_3, self::EDU_LEVEL_UNI, self::EDU_LEVEL_DOC);
    }

    /**
     * @ return string get text value for Education level
     */
    public function getEduLevelText() {
        $eduLevelOptions = self::getEduLevelOptions();
        return isset($eduLevelOptions[$this->educationlevel]) ? $eduLevelOptions[$this->educationlevel] : 'Dữ liệu trống.';
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Contact the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_contact';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fullname, jobname, educationlevel, mobilephone', 'required'),
            array('educationlevel', 'numerical', 'integerOnly' => true),
            array('fullname, jobname, email, website, workaddress, notes', 'length', 'max' => 255),
            array('mobilephone, workphone, create_user_id, update_user_id', 'length', 'max' => 11),
            array('educationlevel', 'in', 'range' => self::getAllowedEduLevel()),
            array('create_time, update_time', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, fullname, jobname, educationlevel, email, website, mobilephone, workaddress, workphone, notes, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
            'updateUser' => array(self::BELONGS_TO, 'User', 'update_user_id'),
            'students' => array(self::MANY_MANY, 'Student', 'tbl_student_contact(contact_id, student_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Mã số người thân',
            'fullname' => 'Họ và tên',
            'jobname' => 'Nghề nghiệp',
            'educationlevel' => 'Trình độ học vấn',
            'email' => 'Email',
            'website' => 'Website',
            'mobilephone' => 'ĐT di động',
            'workaddress' => 'Địa chỉ cơ quan',
            'workphone' => 'ĐT cơ quan',
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
        $criteria->compare('jobname', $this->jobname, true);
        $criteria->compare('educationlevel', $this->educationlevel);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('mobilephone', $this->mobilephone, true);
        $criteria->compare('workaddress', $this->workaddress, true);
        $criteria->compare('workphone', $this->workphone, true);
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