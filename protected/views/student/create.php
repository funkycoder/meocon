<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Học sinh'=>array('index'),
	'Tạo mới',
);

$this->menu=array(
	array('label'=>'Liệt kê tất cả học sinh', 'url'=>array('index')),
	array('label'=>'Quản lý học sinh', 'url'=>array('admin')),
);
?>

<h1>Tạo học sinh mới</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'contact'=>$contact)); ?>