<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $toanhaids ArrayHelper */
/* @var $thangs [] */
/* @var $nams [] */

$this->title = 'Chi phí dự án'
?>
<style>
    table tbody tr:hover {
        background-color: #009cff21;
    }
</style>
<?php $form = ActiveForm::begin([
    'options' => [
        'autocomplete' => 'off',
        'enctype'=> 'multipart/form-data',
        'id'=>'form-chi-phi'
    ]
]); ?>
<div class="danh-muc-view">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <p><?=Html::label('Tháng','thang',['class'=>'form-label'])?></p>
            <?= Html::dropDownList('thang',date('n'),$thangs,['class'=>'form-control','id'=>'thang'])?>
        </div>
        <div class="col-md-3">
            <p><?=Html::label('Năm','nam',['class'=>'form-label'])?></p>
            <?= Html::dropDownList('nam',date('Y'),$nams,['class'=>'form-control','id'=>'nam'])?>
        </div>
        <div class="col-md-3">
            <p><?=Html::label('Tòa nhà','toa_nha',['class'=>'form-label'])?></p>
            <?= Html::dropDownList('toa_nha',null,$toanhaids,['class'=>'form-control','id'=>'toa_nha'])?>
        </div>
    </div>
    <div class="margin-top-35">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span class="small-font tong-chi"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat green-haze">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span class="small-font tong-thu"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue-madison">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span class="small-font loi-nhuan"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table text-nowrap table-striped table-bordered danh-sach-chi-phi">
            <thead>
            <tr>
                <th width="20%">Danh mục</th>
                <th>Ghi chú</th>
                <th width="20%">Thành tiền</th>
                <th width="20%">Đã thanh toán</th>
                <th width="1%">Xóa</th>
            </tr>
            </thead>
            <tbody id="thong_ke">
            </tbody>
        </table>
        <div class="text-right btn-them">
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/backend/assets/js-view/thong-ke.js',[ 'depends' => ['backend\assets\Qltk2Asset'], 'position' => \yii\web\View::POS_END ]); ?>
