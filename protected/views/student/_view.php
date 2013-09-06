<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::encode($data->id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->fullname), array('student/view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
    <?php echo CHtml::encode($data->dob); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
    <?php echo CHtml::encode(ModelHelper::getSexText($data->sex)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('mobilephone')); ?>:</b>
    <?php echo CHtml::encode($data->mobilephone); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('homeaddress')); ?>:</b>
    <?php echo CHtml::encode($data->homeaddress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('homephone')); ?>:</b>
    <?php echo CHtml::encode($data->homephone); ?>
    <br /> 
    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
      <?php echo CHtml::encode($data->class_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
      <?php echo CHtml::encode($data->create_time); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('create_user_id')); ?>:</b>
      <?php echo CHtml::encode($data->create_user_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
      <?php echo CHtml::encode($data->update_time); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('update_user_id')); ?>:</b>
      <?php echo CHtml::encode($data->update_user_id); ?>
      <br />

     */ ?>

</div>