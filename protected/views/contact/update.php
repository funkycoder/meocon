<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'Người thân'=>array('index'),
	$model->fullname=>array('view','id'=>$model->id),
	'Cập nhật',
);

$this->menu=array(
	array('label'=>'Liệt kê người thân', 'url'=>array('index')),
	array('label'=>'Tạo người thân mới', 'url'=>array('create')),
	array('label'=>"Chi tiết {$model->fullname}", 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Quản lý mục người thân', 'url'=>array('admin')),
);
?>

<h1>Cập nhật người thân <?php echo $model->fullname; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>