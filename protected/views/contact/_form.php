<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableAjaxValidation'=>false,
)); ?>

	 <p class="note">Các mục có dấu <span class="required">*</span> không được bỏ trống.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jobname'); ?>
		<?php echo $form->textField($model,'jobname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'jobname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'educationlevel'); ?>
		<?php echo $form->dropDownList($model,'educationlevel',$model->getEduLevelOptions()); ?>
		<?php echo $form->error($model,'educationlevel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobilephone'); ?>
		<?php echo $form->textField($model,'mobilephone',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'mobilephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'workaddress'); ?>
		<?php echo $form->textField($model,'workaddress',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'workaddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'workphone'); ?>
		<?php echo $form->textField($model,'workphone',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'workphone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textField($model,'notes',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'notes'); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->