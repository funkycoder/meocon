<?php
/* @var $this StaffController */
/* @var $data Staff */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::encode($data->id); ?>
    <br />

    <!--Use teacher's name as a link to display detail about this teacher-->
    <b><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->fullname), array('staff/view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
    <?php echo CHtml::encode($data->dob); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
    <?php echo CHtml::encode(ModelHelper::getSexText($data->sex)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('jobtype')); ?>:</b>
    <?php echo CHtml::encode($data->getJobText()); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo ModelHelper::getTextField($data->email) ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('mobilephone')); ?>:</b>
    <?php echo CHtml::encode($data->mobilephone); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('address_id')); ?>:</b>
      <?php echo CHtml::encode($data->address_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
      <?php echo CHtml::encode($data->class_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
      <?php echo CHtml::encode($data->notes); ?>
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