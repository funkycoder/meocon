<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'student-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Các mục có dấu <span class="required">*</span> không được bỏ trống.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'fullname'); ?>
        <?php echo $form->textField($model, 'fullname', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'fullname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'dob'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'dob',
            'attribute' => 'dob',
            'model' => $model,
            'options' => array(
                'dateFormat' => 'dd-mm-yy',
                'altFormat' => 'dd-mm-yy',
                'changeMonth' => true,
                'changeYear' => true,
                'appendText' => ' ngày-tháng-năm',
            ),
        ));
        ?> 

        <?php echo $form->error($model, 'dob'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'sex'); ?>
        <?php echo $form->dropDownList($model, 'sex', ModelHelper::getSexOptions()); ?>
        <?php echo $form->error($model, 'sex'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'siblingorder'); ?>
        <?php echo $form->textField($model, 'siblingorder'); ?>
        <?php echo $form->error($model, 'siblingorder'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'totalsiblings'); ?>
        <?php echo $form->textField($model, 'totalsiblings'); ?>
        <?php echo $form->error($model, 'totalsiblings'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'mobilephone'); ?>
        <?php echo $form->textField($model, 'mobilephone'); ?>
        <?php echo $form->error($model, 'mobilephone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'homeaddress'); ?>
        <?php echo $form->textField($model, 'homeaddress', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'homeaddress'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'homephone'); ?>
        <?php echo $form->textField($model, 'homephone', array('size' => 11, 'maxlength' => 11)); ?>
        <?php echo $form->error($model, 'homephone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Lớp'); ?>
        <?php echo $form->dropDownList($model, 'class_id', ClassRoom::getAllClassroom()); ?>
        <?php echo $form->error($model, 'class_id'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'Người thân'); ?>
        <?php if (Yii::app()->user->hasFlash('contactAdded')) { ?>
            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('contactAdded'); ?>
            </div>
            <?php
        } else {
            echo $this->renderPartial('/Contact/_form', array(
                'model' => $contact,
            ));
        }
        ?>
    </div>
    <div class="row">
            <?php echo $form->labelEx($model, 'Người thân'); ?>
        <ul class="contacts>">
            <?php
            if ($model->contacts) {
                foreach ($model->contacts as $contact) {
                    echo "<li>" . $contact->getInfo() . "</li>";
                }
            } else {
                echo 'Dữ liệu trống';
            }
            ?>
        </ul>

    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'create_time'); ?>
        <?php echo $form->textField($model, 'create_time'); ?>
<?php echo $form->error($model, 'create_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'create_user_id'); ?>
        <?php echo $form->textField($model, 'create_user_id', array('size' => 11, 'maxlength' => 11)); ?>
<?php echo $form->error($model, 'create_user_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'update_time'); ?>
        <?php echo $form->textField($model, 'update_time'); ?>
<?php echo $form->error($model, 'update_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'update_user_id'); ?>
        <?php echo $form->textField($model, 'update_user_id', array('size' => 11, 'maxlength' => 11)); ?>
<?php echo $form->error($model, 'update_user_id'); ?>
    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->