<?php
/* @var $this ClassRoomController */
/* @var $model ClassRoom */

$this->breadcrumbs=array(
	'Class Rooms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClassRoom', 'url'=>array('index')),
	array('label'=>'Create ClassRoom', 'url'=>array('create')),
	array('label'=>'View ClassRoom', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClassRoom', 'url'=>array('admin')),
);
?>

<h1>Update ClassRoom <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>