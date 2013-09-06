<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs = array(
    'Người thân' => array('index'),
    'Quản lý',
);

$this->menu = array(
    array('label' => 'Liệt kê người thân', 'url' => array('index')),
    array('label' => 'Tạo người thân mới', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contact-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Quản lý mục người thân</h1>

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
    'id' => 'contact-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'fullname',
        'jobname',
        'educationlevel',
        'email',
        'website',
        'mobilephone',
        'workaddress',
        /*
          'mobilephone',
          'workaddress',
          'workphone',
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
