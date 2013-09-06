<?php
/* @var $this ContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Người thân',
);

$this->menu=array(
	array('label'=>'Tạo người thân mới', 'url'=>array('create')),
	array('label'=>'Quản lý mục người thân', 'url'=>array('admin')),
);
?>

<h1>Người thân</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
