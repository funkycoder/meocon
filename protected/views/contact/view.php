<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'Người thân'=>array('index'),
	$model->fullname,
);

$this->menu=array(
	array('label'=>'Liệt kê người thân', 'url'=>array('index')),
	array('label'=>'Tạo người thân mới', 'url'=>array('create')),
	array('label'=>"Cập nhật {$model->fullname}", 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>"Xóa {$model->fullname}", 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Quản lý mục người thân', 'url'=>array('admin')),
);
?>

<h1>Chi tiết người thân <?php echo $model->fullname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fullname',
		'jobname',
		array('name'=>'educationlevel',
                    'value'=>$model->getEduLevelText()),
		'email',
		'website',
		'mobilephone',
		'workaddress',
		'workphone',
		'notes',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
