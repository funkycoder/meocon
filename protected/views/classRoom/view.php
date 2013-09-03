<?php
/* @var $this ClassRoomController */
/* @var $model ClassRoom */

$this->breadcrumbs=array(
	'Class Rooms'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ClassRoom', 'url'=>array('index')),
	array('label'=>'Create ClassRoom', 'url'=>array('create')),
	array('label'=>'Update ClassRoom', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClassRoom', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClassRoom', 'url'=>array('admin')),
);
?>

<h1>View ClassRoom #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
