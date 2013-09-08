<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Học sinh'=>array('index'),
	$model->fullname=>array('view','id'=>$model->id),
	'Cập nhật',
);

$this->menu=array(
	array('label'=>'Liệt kê tất cả học sinh', 'url'=>array('index')),
	array('label'=>'Tạo học sinh mới', 'url'=>array('create')),
	array('label'=>"Chi tiết {$model->fullname}", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Quản lý học sinh', 'url'=>array('admin')),
);
?>

<h1>Cập nhật học sinh <?php echo $model->fullname; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'contact'=>$contact)); ?>