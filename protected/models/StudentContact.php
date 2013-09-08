<?php

/**
 * This is the model class for table "tbl_student_contact".
 *
 * The followings are the available columns in table 'tbl_student_contact':
 * @property string $id
 * @property string $student_id
 * @property string $contact_id
 * @property integer $relationshiptype
 *
 * The followings are the available model relations:
 * @property Contact $contact
 * @property Student $student
 */
class StudentContact extends CActiveRecord {
    //Define relationship type

    const REL_TYPE_FATHER = 0;
    const REL_TYPE_MOTHER = 1;
    const REL_TYPE_GRAND_FATHER = 2;
    const REL_TYPE_GRAND_MOTHER = 3;
    const REL_TYPE_UNCLE_AUNT = 4;
    const REL_TYPE_BROTHER_SISTER = 5;
    const REL_TYPE_MAID = 6;
    const REL_TYPE_OTHER = 7;

    /**
     * @return array list of possible sex type
     */
    public static function getRelationshipOptions() {
        return array(self::REL_TYPE_FATHER => 'Cha', self::REL_TYPE_MOTHER => 'Mẹ',
            self::REL_TYPE_GRAND_FATHER => 'Ông', self::REL_TYPE_GRAND_MOTHER => 'Bà',
            self::REL_TYPE_UNCLE_AUNT => 'Cô/Dì/Chú/Bác', self::REL_TYPE_BROTHER_SISTER => 'Anh/Chị/Em',
            self::REL_TYPE_MAID => 'Người giúp việc', self::REL_TYPE_OTHER => 'Khác');
    }

    /**
     * @ return string get text value for sex_type
     */
    public function getRelationshipText() {
        $relationshipOptions = self::getRelationshipOptions();
        return isset($relationshipOptions[$this->relationshiptype]) ? $relationshipOptions[$this->relationshiptype] : 'Dữ liệu không đúng.';
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return StudentContact the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_student_contact';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('student_id, contact_id', 'required'),
            array('relationshiptype', 'numerical', 'integerOnly' => true),
            array('student_id, contact_id', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, student_id, contact_id, relationshiptype', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            
            'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
            'contact'=> array(self::BELONGS_TO,'Contact','contact_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'student_id' => 'Student',
            'contact_id' => 'Contact',
            'relationshiptype' => 'Relationshiptype',
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
        $criteria->compare('student_id', $this->student_id, true);
        $criteria->compare('contact_id', $this->contact_id, true);
        $criteria->compare('relationshiptype', $this->relationshiptype);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}