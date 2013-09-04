<?php
/* @var $this ClassRoomController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Các lớp học',
);

$this->menu=array(
	array('label'=>'Tạo lớp học mới', 'url'=>array('create')),
	array('label'=>'Quản lý các lớp', 'url'=>array('admin')),
);
?>

<h1>Liệt kê các lớp học</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
