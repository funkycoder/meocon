<?php
/* @var $this StaffController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nhân viên',
);

$this->menu=array(
	array('label'=>'Tạo nhân viên mới', 'url'=>array('create')),
	array('label'=>'Quản lý nhân viên', 'url'=>array('admin')),
);
?>

<h1>Liệt kê nhân viên</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
