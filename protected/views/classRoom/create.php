<?php
/* @var $this ClassRoomController */
/* @var $model ClassRoom */

$this->breadcrumbs=array(
	'Class Rooms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClassRoom', 'url'=>array('index')),
	array('label'=>'Manage ClassRoom', 'url'=>array('admin')),
);
?>

<h1>Create ClassRoom</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>