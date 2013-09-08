<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs = array(
    'Học sinh' => array('index'),
    $model->fullname,
);

$this->menu = array(
    array('label' => 'Liệt kê tất cả học sinh', 'url' => array('index')),
    array('label' => 'Tạo học sinh mới', 'url' => array('create')),
    array('label' => "Cập nhật {$model->fullname}", 'url' => array('update', 'id' => $model->id)),
    array('label' => "Xóa {$model->fullname}", 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Quản lý học sinh', 'url' => array('admin')),
);
?>

<h1>Thông tin chi tiết về <?php echo $model->fullname; ?></h1>
<h2>(Học sinh lớp <?php echo CHtml::link(ModelHelper::getClassName($model->classRoom), array('/classRoom/view', 'id' => $model->classRoom->id)) ?>)</h2>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'fullname',
        'dob',
        array('name' => 'sex',
            'value' => ModelHelper::getSexText($model->sex)),
        'siblingorder',
        'totalsiblings',
        'mobilephone',
        'homeaddress',
        'homephone',
        'create_time',
        'create_user_id',
        'update_time',
        'update_user_id',
    ),
));
?>
<br/>
<h1>Thông tin về người thân</h1>
<?php
if ($model->studentContacts) {
    foreach ($model->studentContacts as $studentContact) {
        echo "<h2>{$studentContact->getRelationshipText()} :</h2>";
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $studentContact->contact,
            'attributes' => array(
                'id',
                'fullname',
                'jobname',
                array('name' => 'educationlevel',
                    'value' => $studentContact->contact->getEduLevelText()),
                'email',
                'website',
                'mobilephone',
                'workaddress',
                'workphone',
                'notes',
            ),
        ));
        echo '<br/>';
    }
} else {
    echo 'Dữ liệu trống.';
}
?>