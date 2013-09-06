<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs = array(
    'Nhân viên' => array('index'),
    $model->fullname,
);

$this->menu = array(
    array('label' => 'Liệt kê tất cả nhân viên', 'url' => array('index')),
    array('label' => 'Tạo nhân viên mới', 'url' => array('create')),
    array('label' => "Cập nhật {$model->fullname}", 'url' => array('update', 'id' => $model->id)),
    array('label' => "Xóa {$model->fullname}", 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => "Bạn muốn xóa {$model->fullname}")),
    array('label' => 'Quản lý nhân viên', 'url' => array('admin')),
);
?>

<h1>Thông tin chi tiết về <?php echo $model->fullname; ?></h1>
<h2>(Lớp <?php echo CHtml::link(ModelHelper::getClassName($model->classRoom), array('/classRoom/view', 'id' => $model->classRoom->id)) ?>)</h2>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'fullname',
        'dob',
        array('name' => 'sex',
            'value' => ModelHelper::getSexText($model->sex)),
        array('name' => 'jobtype',
            'value' => $model->getJobText()),
        array('name' => 'email',
            'value' => ModelHelper::getTextField($model->email)),
        'mobilephone',
        'address_id',
        'notes',
        'create_time',
        'create_user_id',
        'update_time',
        'update_user_id',
    ),
));
?>
<br/>
<h1>Học sinh trong lớp</h1>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $studentDataProvider,
    'itemView' => '/student/_view',
))
?>