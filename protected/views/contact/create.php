<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'Người thân'=>array('index'),
	'Tạo mới',
);

$this->menu=array(
	array('label'=>'Liệt kê người thân', 'url'=>array('index')),
	array('label'=>'Quản lý mục người thân', 'url'=>array('admin')),
);
?>

<h1>Tạo người thân mới</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>