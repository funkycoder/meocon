<?php
/* @var $this ClassRoomController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Class Rooms',
);

$this->menu=array(
	array('label'=>'Create ClassRoom', 'url'=>array('create')),
	array('label'=>'Manage ClassRoom', 'url'=>array('admin')),
);
?>

<h1>Class Rooms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
