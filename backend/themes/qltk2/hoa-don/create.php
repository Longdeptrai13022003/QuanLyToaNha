<?php

use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $toanhaids ArrayHelper */
/* @var $giaDienIDs ArrayHelper */
/* @var $giaNuocs ArrayHelper */
/* @var $dichVus \backend\models\ThietLapGia[] */
$thangs = [];
for ($i = 1; $i <= 12; $i++){
    $thangs[$i] = 'Tháng '.$i;
}
$nams = [];
for ($i = 2000; $i <= 2050; $i++){
    $nams[$i] = $i;
}
$defaultGiaDienID = max(array_keys($giaDienIDs));
$defaultGiaNuoc = max(array_keys($giaNuocs));

$this->title = 'Lập hóa đơn';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    table tbody tr:hover {
        background-color: #009cff21;
    }
</style>
<div class="hoa-don-create">
    <?php $form = ActiveForm::begin([
        'options' => [
            'autocomplete' => 'off',
            'enctype'=> 'multipart/form-data',
            'id'=>'form-lap-hoa-don'
        ]
    ]); ?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <p><?=Html::label('Lọc theo Gói thuê','goi_thue',['class'=>'form-label'])?></p>
            <?= Html::dropDownList('goi_thue','thang',[
                    '3_gio' => '3 giờ',
                    '6_gio' => '6 giờ',
                    'ngay' => 'Theo ngày',
                    'thang' => 'Theo tháng'
            ],['class'=>'form-control','id'=>'goi_thue'])?>
        </div>
        <div class="col-md-2">
            <p><?=Html::label('Lọc theo Tháng','thang',['class'=>'form-label'])?></p>
            <?= Html::dropDownList('thang',date('n'),$thangs,['class'=>'form-control','id'=>'thang'])?>
        </div>
        <div class="col-md-2">
            <p><?=Html::label('Lọc theo Năm','nam',['class'=>'form-label'])?></p>
            <?= Html::dropDownList('nam',date('Y'),$nams,['class'=>'form-control','id'=>'nam'])?>
        </div>
        <div class="col-md-2">
            <p><?=Html::label('Tòa nhà','toa_nha',['class'=>'form-label'])?></p>
            <?= Html::dropDownList('toa_nha',null,$toanhaids,['class'=>'form-control','id'=>'toa_nha'])?>
        </div>
        <div class="col-md-2">
            <p><?=Html::label('Đơn vị tính tiền nước','kieu_tien_nuoc',['class'=>'form-label'])?></p>
            <?= Html::dropDownList('kieu_tien_nuoc', 'Theo số người', [
                    'so_nguoi' => 'Theo số người',
                    'so_khoi' => 'Theo số khối'
            ],['class'=>'form-control','id'=>'kieu_tien_nuoc'])?>
        </div>
    </div>

    <div class="margin-top-35">
        <div class="row">
            <div class="col-md-4">
                <h4 class="text-primary">BẢNG THIẾT LẬP HÓA ĐƠN</h4>
            </div>
            <div class="col-md-4 ">
                <div id='thanh-cong'></div>
            </div>
            <div class="col-md-4">
                <div class="text-right btn-save-bill">
                </div>
            </div>
        </div>
        <center><h4 class="text-danger">DOANH THU THÁNG: <span class="doanh-thu">0</span></h4></center>
        <div id="bang-hoa-don"></div>
    </div>
    <div class="text-right btn-save-bill">
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/backend/assets/js-view/hoa-don.js',[ 'depends' => ['backend\assets\Qltk2Asset'], 'position' => \yii\web\View::POS_END ]); ?>