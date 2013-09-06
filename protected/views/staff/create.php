<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs=array(
	'Nhân viên'=>array('index'),
	'Tạo mới',
);

$this->menu=array(
	array('label'=>'Liệt kê tất cả nhân viên', 'url'=>array('index')),
	array('label'=>'Quản lý nhân viên', 'url'=>array('admin')),
);
?>

<h1>Tạo nhân viên mới</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>