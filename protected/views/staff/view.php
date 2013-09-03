<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Staff', 'url'=>array('index')),
	array('label'=>'Create Staff', 'url'=>array('create')),
	array('label'=>'Update Staff', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Staff', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Staff', 'url'=>array('admin')),
);
?>

<h1>View Staff #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fullname',
		'dob',
		'sex',
		'jobtype',
		'email',
		'mobilephone',
		'address_id',
		'class_id',
		'notes',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>