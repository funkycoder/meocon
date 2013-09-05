<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelHelper
 *
 * @author Quan Nguyen
 */
class ModelHelper {
    //Define sex

    const SEX_MALE = 0;
    const SEX_FEMALE = 1;

    /**
     * @return array list of possible sex type
     */
    public static function getSexOptions() {
        return array(self::SEX_FEMALE => 'Nữ', self::SEX_MALE => 'Nam');
    }

    /**
     * @return array of allowed sex type
     */
    public static function getAllowedSexType() {
        return array(self::SEX_FEMALE, self::SEX_MALE);
    }

    /**
     * @ return string get text value for sex_type
     */
    public static function getSexText($sex_type) {
        $sexOptions = self::getSexOptions();//magic function
        return isset($sexOptions[$sex_type]) ? $sexOptions[$sex_type] : 'Dữ liệu trống.';
    }
 /**
     * @ return string ClassRoom name
     */
    public static function getClassName(ClassRoom $classRoom_object) {
        //classRoom defined in relations
        return isset($classRoom_object) ? CHtml::encode($classRoom_object->name) : "Dữ liệu trống";
    }
}

?>
