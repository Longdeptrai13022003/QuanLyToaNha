<?php
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \backend\models\PhongKhach */
/* @var $khach \common\models\User */
$tienPhong = $model->don_gia * $model->so_thang_hop_dong;
$phiDichVu = $model->thanh_tien + $model->so_tien_chiet_khau - $tienPhong;
?>

<!-- Tích hợp Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap') !important;

    body {
        font-family: 'Roboto', sans-serif !important;
        background: linear-gradient(135deg, #f4f4f4 0%, #e9ecef 100%) !important;
        color: #333 !important;
    }

    .contract-wrapper {
        max-width: 1200px !important;
        margin: 0 auto !important;
    }

    .contract-container {
        background: #fff !important;
        border-radius: 16px !important;
        padding: 40px !important;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08) !important;
        border: 1px solid #e9ecef !important;
    }

    .section {
        margin-bottom: 50px !important;
    }

    .section-title {
        font-size: 24px !important;
        font-weight: 500 !important;
        color: #3498db !important;
        margin-bottom: 25px !important;
        padding-bottom: 12px !important;
        border-bottom: 2px solid #3498db !important;
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
    }

    .card {
        background: #fff !important;
        border-radius: 15px !important;
        padding: 25px !important;
        margin-bottom: 25px !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05) !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease !important;
        border-left: 4px solid #3498db !important;
    }

    .card:hover {
        transform: translateY(-10px) !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .card .info-row {
        display: flex !important;
        justify-content: space-between !important;
        margin-bottom: 15px !important;
        flex-wrap: wrap !important;
    }

    .card .info-item {
        flex: 1 !important;
        margin-right: 20px !important;
        min-width: 200px !important;
    }

    .card .info-item:last-child {
        margin-right: 0 !important;
    }

    .card p {
        margin: 0 !important;
        font-size: 16px !important;
        color: #555 !important;
        line-height: 1.6 !important;
    }

    .card strong {
        color: #2c3e50 !important;
        font-weight: 600 !important;
    }

    .card .money {
        color: #27ae60 !important;
        font-weight: 500 !important;
        background: #e8f5e9 !important;
        padding: 2px 8px !important;
        border-radius: 4px !important;
    }

    .form-control {
        border: 1px solid #ced4da !important;
        border-radius: 6px !important;
        padding: 10px !important;
        font-size: 16px !important;
        width: 100% !important;
        box-sizing: border-box !important;
        transition: border-color 0.3s ease !important;
    }

    .form-control:focus {
        border-color: #3498db !important;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.3) !important;
        outline: none !important;
    }

    .form-control.text-right {
        text-align: right !important;
    }

    .transaction-input {
        background: #f1f8ff !important;
        padding: 15px !important;
        border-radius: 8px !important;
        margin-bottom: 15px !important;
        display: flex !important;
        align-items: center !important;
    }

    .file-input-wrapper {
        position: relative !important;
        width: 100% !important;
    }

    .file-input-wrapper input[type="file"] {
        width: 100% !important;
        padding: 10px !important;
        font-size: 16px !important;
        border: 1px solid #ced4da !important;
        border-radius: 6px !important;
        background: #fff !important;
        cursor: pointer !important;
        opacity: 0 !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        height: 100% !important;
    }

    .file-input-wrapper .custom-file-button {
        background: #3498db !important;
        color: #fff !important;
        border: none !important;
        padding: 10px 15px !important;
        border-radius: 6px !important;
        cursor: pointer !important;
        font-size: 14px !important;
        margin-right: 10px !important;
        transition: background 0.3s ease !important;
    }

    .file-input-wrapper .custom-file-button:hover {
        background: #2980b9 !important;
    }

    .file-input-wrapper .file-name {
        flex: 1 !important;
        padding: 10px !important;
        background: #fff !important;
        border: 1px solid #ced4da !important;
        border-radius: 6px !important;
        color: #555 !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        white-space: nowrap !important;
    }

    @media (max-width: 768px) {
        .card .info-row {
            flex-direction: column !important;
        }

        .card .info-item {
            margin-right: 0 !important;
            margin-bottom: 10px !important;
        }

        .contract-container {
            padding: 20px !important;
        }

        .file-input-wrapper {
            max-width: 100% !important;
        }

        .transaction-input {
            flex-direction: column !important;
            align-items: stretch !important;
        }

        .file-input-wrapper .custom-file-button {
            margin-bottom: 10px !important;
        }
    }
</style>

<?php $form = ActiveForm::begin([
    'options' => [
        'autocomplete' => 'off',
        'enctype' => 'multipart/form-data',
        'id' => 'form-thanh-toan'
    ]
]); ?>
<div class="contract-wrapper">
    <div class="contract-container">
        <?= Html::hiddenInput('con_lai', $tienPhong + $phiDichVu - $model->da_thanh_toan - $model->so_tien_chiet_khau, ['id' => 'con_lai']) ?>
        <?= Html::hiddenInput('phong_khach_id', $model->id, ['id' => 'phong_khach_id']) ?>

        <div class="section">
            <h4 class="section-title"><i class="fas fa-user"></i> Thông tin khách hàng</h4>
            <div class="card">
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Họ tên:</strong> <?= Html::encode($khach->hoten) ?></p>
                    </div>
                    <div class="info-item">
                        <p><strong>Điện thoại:</strong> <?= Html::encode($khach->dien_thoai) ?></p>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>CCCD:</strong> <?= Html::encode($khach->so_cccd) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h4 class="section-title"><i class="fas fa-file-contract"></i> Thông tin hợp đồng</h4>
            <div class="card">
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Đơn giá:</strong> <span class="money"><?= number_format($model->don_gia, 0, ',', '.') ?></span></p>
                    </div>
                    <div class="info-item">
                        <p><strong>Tổng tiền:</strong> <span class="money"><?= number_format($model->thanh_tien, 0, ',', '.') ?></span></p>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Số tháng:</strong> <span class="money"><?= $model->so_thang_hop_dong ?></span></p>
                    </div>
                    <div class="info-item">
                        <p><strong>Chiết khấu:</strong> <span class="money"><?= number_format($model->so_tien_chiet_khau, 0, ',', '.') ?> <?= $model->kieu_chiet_khau == '%' ? '(' . $model->chiet_khau . '%)' : '' ?></span></p>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Tạm tính:</strong> <span class="money"><?= number_format($tienPhong, 0, ',', '.') ?></span></p>
                    </div>
                    <div class="info-item">
                        <p><strong>Đã thanh toán:</strong> <span class="money"><?= number_format($model->da_thanh_toan, 0, ',', '.') ?></span></p>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Tiền dịch vụ:</strong> <span class="money"><?= number_format($phiDichVu, 0, ',', '.') ?></span></p>
                    </div>
                    <div class="info-item">
                        <p><strong>Còn lại:</strong> <span class="money"><?= number_format($model->thanh_tien - $model->da_thanh_toan, 0, ',', '.') ?></span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h4 class="section-title"><i class="fas fa-money-check-alt"></i> Thông tin giao dịch</h4>
            <div class="card">
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Số tiền giao dịch:</strong></p>
                        <div class="transaction-input">
                            <?= Html::input('text', 'so_tien', 0, ['class' => 'form-control text-right', 'id' => 'so_tien']) ?>
                        </div>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Ảnh chuyển khoản:</strong></p>
                        <div class="transaction-input file-input-wrapper">
                            <?= Html::fileInput('anh_chuyen_khoan[]', null, ['multiple' => 'multiple', 'class' => 'form-control', 'id' => 'anh-chuyen-khoan']) ?>
                            <label for="anh-chuyen-khoan" class="custom-file-button">Chọn tệp</label>
                            <span class="file-name">Chưa chọn tệp</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/backend/assets/js-view/hop-dong.js', ['depends' => ['backend\assets\Qltk2Asset'], 'position' => \yii\web\View::POS_END]); ?>

<script>
    document.getElementById('anh-chuyen-khoan').addEventListener('change', function(e) {
        const fileNameSpan = document.querySelector('.file-name');
        if (e.target.files.length > 0) {
            fileNameSpan.textContent = e.target.files[0].name;
        } else {
            fileNameSpan.textContent = 'Chưa chọn tệp';
        }
    });
</script>