<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php echo $form->textField($model,'dob'); ?>
		<?php echo $form->error($model,'dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'totalsiblings'); ?>
		<?php echo $form->textField($model,'totalsiblings'); ?>
		<?php echo $form->error($model,'totalsiblings'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'siblingorder'); ?>
		<?php echo $form->textField($model,'siblingorder'); ?>
		<?php echo $form->error($model,'siblingorder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_id'); ?>
		<?php echo $form->textField($model,'address_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'address_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobilephone'); ?>
		<?php echo $form->textField($model,'mobilephone'); ?>
		<?php echo $form->error($model,'mobilephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'father_id'); ?>
		<?php echo $form->textField($model,'father_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'father_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mother_id'); ?>
		<?php echo $form->textField($model,'mother_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'mother_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class_id'); ?>
		<?php echo $form->textField($model,'class_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'class_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_user_id'); ?>
		<?php echo $form->textField($model,'create_user_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'create_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_user_id'); ?>
		<?php echo $form->textField($model,'update_user_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'update_user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->