<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs = array(
    'Nhân viên' => array('index'),
    'Quản lý',
);

$this->menu = array(
    array('label' => 'Liệt kê tất cả nhân viên', 'url' => array('index')),
    array('label' => 'Tạo nhân viên mới', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('staff-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Quản lý nhân viên mới</h1>

<p>
    Có thể dùng các dấu so sánh như (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) ở trước các giá trị cần tìm để lọc kết quả.
</p>

<?php echo CHtml::link('Tìm kiếm nâng cao', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'staff-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'fullname',
        'dob',
        'sex',
        'jobtype',
        'email',
        /*
          'mobilephone',
          'address_id',
          'class_id',
          'notes',
          'create_time',
          'create_user_id',
          'update_time',
          'update_user_id',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
