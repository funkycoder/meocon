<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Học sinh',
);

$this->menu=array(
	array('label'=>'Tạo học sinh mới', 'url'=>array('create')),
	array('label'=>'Quản lý học sinh', 'url'=>array('admin')),
);
?>

<h1>Liệt kê tất cả học sinh</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
