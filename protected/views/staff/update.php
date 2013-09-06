<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs=array(
	'Nhân viên'=>array('index'),
	$model->fullname=>array('view','id'=>$model->id),
	'Cập nhật',
);

$this->menu=array(
	array('label'=>'Liệt kê tất cả nhân viên', 'url'=>array('index')),
	array('label'=>'Tạo nhân viên mới', 'url'=>array('create')),
	array('label'=>"Chi tiết {$model->fullname}", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Quản lý nhân viên', 'url'=>array('admin')),
);
?>

<h1>Cập nhật nhân viên <?php echo $model->fullname; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>