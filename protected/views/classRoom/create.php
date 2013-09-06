<?php
/* @var $this ClassRoomController */
/* @var $model ClassRoom */

$this->breadcrumbs=array(
	'Các lớp học'=>array('index'),
	'Tạo mới',
);

$this->menu=array(
	array('label'=>'Liết kê các lớp học', 'url'=>array('index')),
	array('label'=>'Quản lý lớp học', 'url'=>array('admin')),
);
?>

<h1>Tạo lớp học mới</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>