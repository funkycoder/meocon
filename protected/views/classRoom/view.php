<?php
/* @var $this ClassRoomController */
/* @var $model ClassRoom */

$this->breadcrumbs = array(
    'Các lớp học' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => "Cập nhật lớp {$model->name}", 'url' => array('update', 'id' => $model->id)),
    array('label' => "Xóa lớp {$model->name}", 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Bạn muốn xóa lớp học này?')),
    array('label' => 'Liệt kê các lớp học', 'url' => array('index')),
    array('label' => 'Tạo lớp học mới', 'url' => array('create')),
    array('label' => 'Quản lý các lớp', 'url' => array('admin')),
);
?>

<h1>Thông tin lớp <?php echo $model->name; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'description',
        'create_time',
        'create_user_id',
        'update_time',
        'update_user_id',
    ),
));
//Display Teachers in this classroom
//Use CListView to diplay a list of teachers 
?>
<br/>
<h1>Giáo viên trong lớp</h1>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $teacherDataProvider,
    'itemView' => '/staff/_view',
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
