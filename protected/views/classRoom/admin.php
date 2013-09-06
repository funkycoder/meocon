<?php
/* @var $this ClassRoomController */
/* @var $model ClassRoom */

$this->breadcrumbs=array(
	'Các lớp học'=>array('index'),
	'Quản lý',
);

$this->menu=array(
	array('label'=>'Liệt kê các lớp học', 'url'=>array('index')),
	array('label'=>'Tạo lớp học mới', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('class-room-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Quản lý lớp học</h1>

<p>
    Có thể dùng các dấu so sánh như (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) ở trước các giá trị cần tìm để lọc kết quả.
</p>

<?php echo CHtml::link('Tìm kiếm nâng cao','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'class-room-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'create_time',
		'create_user_id',
		'update_time',
		/*
		'update_user_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
