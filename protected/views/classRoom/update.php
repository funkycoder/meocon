<?php
/* @var $this ClassRoomController */
/* @var $model ClassRoom */

$this->breadcrumbs=array(
	'Các lớp học'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Cập nhật',
);

$this->menu=array(
	array('label'=>'Liệt kê các lớp học', 'url'=>array('index')),
	array('label'=>'Tạo lớp học mới', 'url'=>array('create')),
	array('label'=>"Chi tiết lớp {$model->name}", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Quản lý các lớp học', 'url'=>array('admin')),
);
?>

<h1>Cập nhật lớp <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>