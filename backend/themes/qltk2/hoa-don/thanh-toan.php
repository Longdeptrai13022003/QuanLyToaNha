<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $IDs [] */
/* @var $phongs [] */
/* @var $conNos [] */
/* @var $phaiTras [] */
/* @var $khachs [] */

$this->registerCss('
    /* Tổng thể */
    .block-giao-dich {
        font-family: "Roboto", sans-serif !important;
        border-radius: 12px !important;
        overflow: hidden !important;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15) !important;
        background: #fff !important;
        padding: 20px !important;
        margin-bottom: 30px !important;
    }
    .table {
        margin-bottom: 0 !important;
        border-collapse: separate !important;
        border-spacing: 0 !important;
    }
    
    /* Header Table */
    .table > thead > tr > th {
        background: #f0f2f5 !important;
        color: #0b2f70 !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        font-size: 14px !important;
        letter-spacing: 0.5px !important;
        padding: 15px 10px !important;
        border-bottom: 2px solid #e0e6ed !important;
        text-align: center !important;
    }
    
    /* Body Table */
    .table > tbody > tr > td {
        padding: 15px 10px !important;
        vertical-align: middle !important;
        border-color: #edf2f9 !important;
        font-size: 13px !important;
        color: #1a3b5d !important;
    }
    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: #fbfbfd !important;
    }
    .table-hover > tbody > tr:hover {
        background-color: rgba(63,106,216,0.05) !important;
    }
    
    /* Inputs */
    .form-control {
        border-radius: 8px !important;
        border: 1px solid #d1d9e6 !important;
        box-shadow: 0 3px 5px rgba(0,0,0,0.02) !important;
        transition: all 0.2s !important;
        font-size: 13px !important;
        height: 38px !important;
        width: 100% !important;
        text-align: right !important;
    }
    .form-control:focus {
        border-color: #3f6ad8 !important;
        box-shadow: 0 0 0 2px rgba(63,106,216,0.25) !important;
    }
    .form-control::placeholder {
        color: #9ca3af !important;
        font-size: 13px !important;
    }
    .displayIn {
        font-weight: 600 !important;
        color: #3f6ad8 !important;
    }
    
    /* Buttons */
    .btn-giao-dich {
        border-radius: 8px !important;
        padding: 8px 14px !important;
        margin: 2px !important;
        border: none !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        letter-spacing: 0.3px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        transition: all 0.2s !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15) !important;
        text-transform: uppercase !important;
        color: white !important;
    }
    .btn-success {
        background: linear-gradient(135deg, #43a047, #2e7d32) !important;
    }
    .btn-primary {
        background: linear-gradient(135deg, #3f6ad8, #2b4da0) !important;
    }
    .btn-giao-dich:hover {
        color: #fff !important;
        background: linear-gradient(135deg, #3f6ad8, #2b4da0) !important;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important;
        text-decoration: none !important;
    }
    .btn-giao-dich i {
        margin-right: 6px !important;
    }
    
    /* Responsive */
    @media (max-width: 767px) {
        .block-giao-dich {
            margin: 10px !important;
            padding: 15px !important;
        }
        .table > thead > tr > th {
            font-size: 12px !important;
            padding: 10px 8px !important;
        }
        .table > tbody > tr > td {
            font-size: 12px !important;
            padding: 10px 8px !important;
        }
        .form-control {
            font-size: 12px !important;
            height: 34px !important;
        }
        .btn-giao-dich {
            font-size: 12px !important;
            padding: 6px 12px !important;
        }
    }
');
?>

<?php $form = ActiveForm::begin([
    'options' => [
        'autocomplete' => 'off',
        'enctype' => 'multipart/form-data',
        'id' => 'form-tao-giao-dich'
    ]
]); ?>
    <div class="block-giao-dich">
        <?= Html::hiddenInput('gui_thong_bao', '', ['id' => 'gui_thong_bao']) ?>
        <table class="table table-striped table-hover text-nowrap">
            <thead>
            <tr>
                <th>Phòng</th>
                <th>Khách</th>
                <th>Phải trả tháng này</th>
                <th>Còn nợ</th>
                <th>Tổng cộng</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($IDs as $index => $ID): ?>
                <tr>
                    <td>
                    <span class="badge room-badge">
                        <i class="fa fa-door-open" style="margin-right: 6px;"></i>
                        <?= Html::encode($phongs[$index]->name) ?>
                    </span>
                    </td>
                    <td>
                        <div style="font-weight: 600; font-size: 14px; color: #3f6ad8;">
                            <?= Html::encode($khachs[$index]->hoten) ?>
                        </div>
                    </td>
                    <td>
                    <span class="pull-right" style="font-weight: 600; color: #1a3b5d;">
                        <?= number_format(intval(implode('', explode('.', $phaiTras[$index]))) - $conNos[$index], 0, ',', '.') ?>
                    </span>
                    </td>
                    <td>
                    <span class="pull-right" style="font-weight: 600; color: #e74c3c;">
                        <?= number_format($conNos[$index], 0, ',', '.') ?>
                    </span>
                    </td>
                    <td>
                        <?= Html::hiddenInput('hoaDonIDs[]', $ID) ?>
                        <?= Html::textInput('phai_tra[]', $phaiTras[$index], [
                            'class' => 'form-control displayIn',
                            'placeholder' => 'Nhập số tiền...',
                            'style' => 'font-weight: 600; color: #3f6ad8;'
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pull-right" style="margin-top: 15px;">
            <?= Html::a('<i class="fa fa-check-circle"></i> Tạo giao dịch', '#', [
                'class' => 'btn btn-success btn-giao-dich',
                'data-value' => 'giao_dich',
                'title' => 'Tạo giao dịch'
            ]) ?>
            <?= Html::a('<i class="fa fa-bell"></i> Thông báo Zalo', '#', [
                'class' => 'btn btn-primary btn-giao-dich',
                'data-value' => 'gui_zalo',
                'title' => 'Gửi thông báo Zalo'
            ]) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/backend/assets/js-view/hoa-don.js', [
    'depends' => ['backend\assets\Qltk2Asset'],
    'position' => \yii\web\View::POS_END
]); ?>