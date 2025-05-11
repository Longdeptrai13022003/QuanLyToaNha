<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\PhongKhach */
/* @var $khach \common\models\User */
/* @var $sale \common\models\User */
/* @var $packages [] */
/* @var $gios [] */
/* @var $phuts [] */
/* @var $fileHDs \backend\models\FileHopDong[] */
/* @var $phong \backend\models\DanhMuc */
/* @var $form yii\widgets\ActiveForm */
/* @var $toanhaids ArrayHelper */
/* @var $domain string */
/* @var $phongids ArrayHelper */
/* @var $giaoDichs backend\models\GiaoDich */

$domain = Url::base(true);
$anhHopDongs = [];
if(!$model->isNewRecord && !is_null($model->anh_hop_dong)){
    $anhHopDongs = json_decode($model->anh_hop_dong,true);
}

?>

<?php
$this->registerCss("
    /* Base styles */
    body {
        background-color: #f8f9fa;
        color: #495057;
        font-size: 1.2rem !important;
    }
    
    .phong-khach-form {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        padding: 30px;
        margin-bottom: 20px;
    }
    
    /* Card styling */
    .card {
        border: none;
        border-radius: 12px !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        margin-bottom: 24px;
        background-color: #f5f7f7 !important;
        transition: all 0.3s ease;
    }
    
    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }
    
    .card-header {
        background-color: #f5f7f7;
        border-bottom: 1px solid #e9ecef;
        padding: 16px 20px;
        border-top-left-radius: 12px !important;
        border-top-right-radius: 12px !important;
        font-weight: 600;
        color: #212529;
        font-size: 1.8rem !important;
    }
    
    .card-body {
        padding: 20px;
    }
    
    /* Form elements */
    .phong-khach-form .form-group {
        margin-bottom: 20px;
    }
    
    .phong-khach-form .form-group label {
        font-weight: 600 !important;
        color: #344767 !important;
        margin-bottom: 8px;
        font-size: 1.2rem !important;
    }
    
    .phong-khach-form input.form-control,
    .phong-khach-form select.form-control,
    .phong-khach-form textarea.form-control {
        border-radius: 8px !important;
        border: 1px solid #dee2e6 !important;
        padding: 10px 15px;
        font-size: 1.2rem !important;
        transition: all 0.3s ease !important;
        background-color: #f8f9fa;
    }
    
    .phong-khach-form .form-control:focus {
        border-color: #3d7cf4 !important;
        box-shadow: 0 0 0 3px rgba(61, 124, 244, 0.2) !important;
        background-color: #fff;
    }
    
    .phong-khach-form textarea.form-control {
        min-height: 120px;
    }
    
    /* Buttons */
    .btn {
        padding: 10px 20px;
        border-radius: 8px !important;
        font-weight: 600;
        transition: all 0.3s ease;
        text-transform: none;
        font-size: 1.2rem !important;
    }
    
    .btn-primary {
        background-color: #3d7cf4;
        border-color: #3d7cf4;
    }
    
    .btn-primary:hover, .btn-primary:focus {
        background-color: #2c6ae2;
        border-color: #2c6ae2;
        box-shadow: 0 4px 10px rgba(61, 124, 244, 0.3);
    }
    
    .btn-success {
        background-color: #0cbc87;
        border-color: #0cbc87;
    }
    
    .btn-success:hover, .btn-success:focus {
        background-color: #0aa876;
        border-color: #0aa876;
        box-shadow: 0 4px 10px rgba(12, 188, 135, 0.3);
    }
    
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    
    .btn-danger:hover, .btn-danger:focus {
        background-color: #c82333;
        border-color: #bd2130;
        box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
    }
    
    .btn-outline-primary {
        color: #3d7cf4;
        border-color: #3d7cf4;
    }
    
    .btn-outline-primary:hover {
        background-color: #3d7cf4;
        color: #fff;
    }
    
    .btn i {
        margin-right: 5px;
    }
    
    /* Section headings */
    .section-heading {
        font-weight: 600;
        color: #344767;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e9ecef;
    }
    
    /* Custom spacing */
    .mt-4 {
        margin-top: 20px !important;
    }
    
    .mb-4 {
        margin-bottom: 20px !important;
    }
    
    /* Table styling */
    .table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }
    
    .table thead th {
        background-color: #f8f9fa;
        font-weight: 600;
        border-bottom: 2px solid #e9ecef;
        color: #344767;
        text-transform: uppercase;
        font-size: 1.1rem !important;
        letter-spacing: 0.5px;
    }
    
    .table td, .table th {
        padding: 15px;
        vertical-align: middle !important;
        border-top: 1px solid #e9ecef;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(61, 124, 244, 0.05);
    }
    
    /* Striped table */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.02);
    }
    
    /* File upload styling */
    .custom-file-input {
        cursor: pointer;
    }
    
    /* Helper classes */
    .text-primary {
        color: #3d7cf4 !important;
    }
    
    .text-success {
        color: #0cbc87 !important;
    }
    
    .text-danger {
        color: #dc3545 !important;
    }
    
    .text-muted {
        color: #6c757d !important;
    }
    
    .bg-light {
        background-color: #f8f9fa !important;
    }
    
    /* Calendar styling */
    #calendar {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
        padding: 15px;
        margin-bottom: 20px;
    }
    
    /* Document/File display */
    .file-preview {
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        position: relative;
    }
    
    .file-preview:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .file-preview img {
        object-fit: cover;
        width: 100%;
        height: 160px;
    }
    
    .file-preview .file-info {
        padding: 12px;
    }
    
    .file-preview .file-name {
        font-size: 1rem !important;
        font-weight: 600;
        color: #344767;
        margin-bottom: 5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .file-preview .file-type {
        font-size: 0.75rem;
        color: #6c757d;
    }
    
    .file-preview .file-actions {
        position: absolute;
        top: 10px;
        right: 10px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .file-preview:hover .file-actions {
        opacity: 1;
    }
    
    .file-preview .btn-file-action {
        padding: 6px 10px;
        font-size: 0.8rem;
        border-radius: 6px;
        margin-left: 5px;
    }
    
    /* Custom block styling */
    #block-moi-gioi {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        border-left: 4px solid #3d7cf4;
    }
    
    .info-block {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
    }
    
    .info-block h4 {
        margin-top: 0;
        color: #344767;
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 15px;
    }
    
    /* Loader animation */
    .spinner {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 2px solid rgba(0, 0, 0, 0.1);
        border-top-color: #3d7cf4;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .phong-khach-form {
            padding: 20px;
        }
        
        .btn {
            padding: 8px 15px;
        }
    }
    
    @media (max-width: 768px) {
        .card-body {
            padding: 15px;
        }
        
        .phong-khach-form {
            padding: 15px;
        }
    }
    
    /* Icon styling */
    .icon-circle {
        width: 36px;
        height: 36px;
        background-color: #e9ecef;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
    }
    
    .icon-circle i {
        color: #495057;
    }
    
    /* Special fields */
    .amount-field {
        font-weight: 600;
        text-align: right;
    }
    
    .required-field::after {
        content: ' *';
        color: #dc3545;
    }
    
    /* Tooltip styling */
    .tooltip-icon {
        color: #6c757d;
        cursor: help;
        margin-left: 5px;
    }
    
    /* Badges */
    .badge {
        padding: 5px 10px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.75rem;
    }
    
    .badge-primary {
        background-color: rgba(61, 124, 244, 0.1);
        color: #3d7cf4;
    }
    
    .badge-success {
        background-color: rgba(12, 188, 135, 0.1);
        color: #0cbc87;
    }
    
    .badge-warning {
        background-color: rgba(254, 197, 47, 0.1);
        color: #fec52f;
    }
    
    .badge-danger {
        background-color: rgba(220, 53, 69, 0.1);
        color: #dc3545;
    }
    
    /* File upload */
    .file-upload {
        position: relative;
        display: inline-block;
        cursor: pointer;
        width: 100%;
    }
    
    .file-upload-input {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        cursor: pointer;
        z-index: 2;
    }
    
    .file-upload-btn {
        display: block;
        border: 2px dashed #dee2e6;
        border-radius: 10px;
        background-color: #f8f9fa;
        padding: 25px;
        text-align: center;
        color: #6c757d;
        transition: all 0.3s;
    }
    
    .file-upload:hover .file-upload-btn {
        border-color: #3d7cf4;
        color: #3d7cf4;
    }
    
    .file-upload-icon {
        font-size: 24px;
        margin-bottom: 10px;
        color: #3d7cf4;
    }
    
    .file-upload-text {
        font-size: 14px;
        font-weight: 500;
    }
    
    /* Summary box */
    .summary-box {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }
    
    .summary-box .title {
        font-weight: 600;
        color: #344767;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e9ecef;
    }
    
    .summary-box .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #e9ecef;
    }
    
    .summary-box .summary-item:last-child {
        border-bottom: none;
    }
    
    .summary-box .label {
        color: #6c757d;
    }
    
    .summary-box .value {
        font-weight: 600;
        color: #344767;
    }
    
    .summary-box .total {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0cbc87;
    }
    
    .summary-box .total-label {
        font-weight: 600;
        color: #344767;
    }
    
    /* Tab styles */
    .nav-tabs {
        border-bottom: 2px solid #e9ecef;
        margin-bottom: 20px;
    }
    
    .nav-tabs .nav-item {
        margin-bottom: -2px;
    }
    
    .nav-tabs .nav-link {
        border: none;
        border-bottom: 2px solid transparent;
        color: #6c757d;
        font-weight: 600;
        padding: 12px 20px;
        transition: all 0.3s ease;
    }
    
    .nav-tabs .nav-link:hover {
        border-color: transparent;
        color: #3d7cf4;
    }
    
    .nav-tabs .nav-link.active {
        color: #3d7cf4;
        background-color: transparent;
        border-bottom: 2px solid #3d7cf4;
    }
    
    /* Custom padding for fields */
    .phong-khach-form .padding-top-35 {
        padding-top: 20px !important;
    }
    
    .field-label {
        font-weight: 600;
        color: #344767;
    }
    
    .field-value {
        font-weight: 500;
        color: #495057;
    }
    
    /* Add an animation when data is being loaded */
    @keyframes pulse {
        0% { opacity: 0.6; }
        50% { opacity: 1; }
        100% { opacity: 0.6; }
    }
    
    .loading {
        animation: pulse 1.5s infinite;
    }
    
    /* Special highlights */
    .highlight-box {
        background-color: rgba(61, 124, 244, 0.08);
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
    }
    
    /* User info styling */
    .user-info {
        display: flex;
        align-items: center;
        background-color: #f8f9fa;
        border-radius: 10px !important;
        padding: 12px;
        margin-bottom: 15px;
    }
    
    .user-info .user-icon {
        width: 40px;
        height: 40px;
        border-radius: 50% !important;
        background-color: #3d7cf4;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        margin-right: 15px;
    }
    
    .user-info .user-details {
        flex-grow: 1;
        font-size: 1.2rem;
    }
    
    .user-info .user-name {
        font-weight: 600;
        color: #344767;
        margin-bottom: 2px;
        font-size: 1.4rem;
    }
    
    .user-info .user-phone {
        font-size: 1.2rem;
        color: #6c757d;
    }
    
    .user-info .remove-user {
        color: #dc3545;
        cursor: pointer;
        font-size: 16px;
        margin-left: 10px;
    }
    
    /* Custom form actions */
    .form-actions {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        text-align: right;
        margin-top: 30px;
    }
    
    .form-actions .btn {
        margin-left: 10px;
    }
    
    /* Make the form sections stand out */
    .form-section {
        margin-bottom: 30px;
    }
    
    .form-section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #344767;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e9ecef;
    }
    
    /* Success notifications */
    .success-notification {
        background-color: rgba(12, 188, 135, 0.1);
        border-left: 4px solid #0cbc87;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    
    .success-notification .title {
        color: #0cbc87;
        font-weight: 600;
        margin-bottom: 5px;
    }
    
    .success-notification .message {
        color: #495057;
    }
    /* Cảnh báo */
    .table-warning {
        background-color: #fff8e1 !important;
        border-left: 5px solid #ffc107;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }
    
    /* Thành công */
    .table-success {
        background-color: #e8f5e9 !important;
        border-left: 5px solid #4caf50;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }
    
    /* Hover nhẹ */
    .table-warning:hover {
        background-color: #ffecb3 !important;
    }
    
    .table-success:hover {
        background-color: #c8e6c9 !important;
    }
");
?>

    <div class="phong-khach-form">
        <?php $form = ActiveForm::begin([
            'options' => [
                'autocomplete' => 'off',
                'enctype'=> 'multipart/form-data',
                'id'=>'form-them-hop-dong',
                'class' => 'needs-validation'
            ]
        ]); ?>

        <?=Html::activeHiddenInput($model,'khach_hang_id') ?>
        <?=Html::activeHiddenInput($model,'sale_id') ?>
        <?=$model->isNewRecord ? '' : Html::HiddenInput('hop_dong_id',$model->id,['id'=>'hop_dong_id']) ?>

        <!-- Header section with title -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="section-heading mb-0">
                <?= $model->isNewRecord ? 'Tạo hợp đồng mới' : 'Cập nhật hợp đồng' ?>
            </h4>

            <div>
                <?= Html::a('<i class="fa fa-arrow-left"></i> Quay lại danh sách', '#', [
                    'class' => 'btn btn-outline-primary',
                    'id' => 'btn-quay-lai-danh-sach'
                ]) ?>

                <?= Html::a('<i class="fa fa-floppy-o"></i> Lưu lại', '#', [
                    'class' => $model->isNewRecord ? 'btn btn-success btn-save-hop-dong ml-2' : 'btn btn-success btn-update-hop-dong ml-2'
                ]) ?>
            </div>
        </div>

        <div class="row">
            <!-- Main Content -->
            <div class="col-md-8">
                <!-- Thông tin cơ bản -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-file-text-o mr-2"></i> Thông tin cơ bản
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <?= $form->field($model,'loai_hop_dong')
                                    ->dropDownList($packages, [
                                        'prompt' => 'Tất cả',
                                        'class' => 'form-control custom-select'
                                    ])
                                    ->label('Chọn gói thuê <span class="text-danger">*</span>')
                                ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($model, 'ma_hop_dong')
                                    ->textInput([
                                        'value' => $model->ma_hop_dong,
                                        'readonly' => 'readonly',
                                        'class' => 'form-control'
                                    ])
                                    ->label('Mã hợp đồng <span class="text-danger">*</span>')
                                ?>
                            </div>
                        </div>

                        <!-- Thông tin khách hàng -->
                        <div class="row" style="margin-top: 15px;">
                            <!-- Khách hàng -->
                            <div class="col-md-6">
                                <label class="field-label">Khách hàng <span class="text-danger">*</span></label>

                                <div style="margin-top: 10px;">
                                    <?= Html::a('<i class="fa fa-check-circle"></i> Chọn KH', '#', [
                                        'class' => 'btn btn-primary',
                                        'id' => 'btn-chon-khach-hang',
                                    ]) ?>

                                    <?= Html::a('<i class="fa fa-plus"></i> Thêm KH', '#', [
                                        'class' => 'btn btn-default',
                                        'id' => 'btn-them-khach-hang',
                                        'style' => 'margin-left: 10px;',
                                    ]) ?>
                                </div>

                                <div style="margin-top: 10px;" id="khach-hang-da-chon">
                                    <?php if (!$model->isNewRecord && $model->khach_hang_id): ?>
                                        <div class="user-info">
                                            <div class="user-icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name"><?= $khach->hoten ?></div>
                                                <div class="user-phone"><?= $khach->dien_thoai ?></div>
                                            </div>
                                            <a href="#" class="remove-user" id="xoa-khach-da-chon">
                                                <i class="fa fa-times-circle"></i> Xoá
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Sale -->
                            <div class="col-md-6">
                                <label class="field-label">Sale</label>

                                <div style="margin-top: 10px;">
                                    <?= Html::a('<i class="fa fa-check-circle"></i> Chọn Sale', '#', [
                                        'class' => 'btn btn-primary',
                                        'id' => 'btn-chon-sale',
                                    ]) ?>

                                    <?= Html::a('<i class="fa fa-plus"></i> Thêm Sale', '#', [
                                        'class' => 'btn btn-default',
                                        'id' => 'btn-them-sale',
                                        'style' => 'margin-left: 10px;',
                                    ]) ?>
                                </div>

                                <div style="margin-top: 10px;" id="sale-da-chon">
                                    <?php if (!$model->isNewRecord && $model->sale_id): ?>
                                        <div class="user-info">
                                            <div class="user-icon" style="background-color: #0cbc87;">
                                                <i class="fa fa-user-circle"></i>
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name"><?= $sale->hoten ?></div>
                                                <div class="user-phone"><?= $sale->dien_thoai ?></div>
                                            </div>
                                            <a href="#" class="remove-user" id="xoa-sale-da-chon">
                                                <i class="fa fa-times-circle"></i> Xoá
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                <!-- Thông tin phòng và thời gian -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-calendar mr-2"></i> Thông tin phòng và thời gian
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?= Html::label('Tòa nhà <span class="text-danger">*</span>', 'toa-nha-selection') ?>
                                    <?= Html::dropDownList('toa_nha_id',
                                        $model->isNewRecord ? null : $phong->parent_id,
                                        $toanhaids,
                                        [
                                            'prompt' => '-- Chọn --',
                                            'class' => 'form-control custom-select',
                                            'id' => 'toa-nha-id'
                                        ]
                                    ); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($model, 'phong_id')
                                    ->dropDownList($model->isNewRecord ? [] : $phongids, [
                                        'class' => 'form-control custom-select',
                                        'prompt' => '-- Chọn phòng --'
                                    ])
                                    ->label('Chọn phòng <span class="text-danger">*</span>')
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="field-label">Thời gian thuê từ <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?= \common\models\myAPI::activeDateField2(
                                            $form, $model, 'thoi_gian_hop_dong_tu',
                                            'Từ ngày', '2020:2050',
                                            ['class' => 'form-control tu_ngay', 'value' => $model->thoi_gian_hop_dong_tu]
                                        ) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <br>
                                        <span style="font-weight: bold">Giờ vào</span>
                                        <?= Html::dropDownList(
                                            'gio_vao',
                                            $model->isNewRecord ? date('H') : DateTime::createFromFormat('Y-m-d H:i:s', $model->thoi_gian_hop_dong_tu)->format('H'),
                                            $gios,
                                            ['class' => 'form-control custom-select', 'id' => 'gio_vao']
                                        ) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <br>
                                        <span style="font-weight: bold">Phút vào</span>
                                        <?= Html::dropDownList(
                                            'phut_vao',
                                            $model->isNewRecord ? date('i') : DateTime::createFromFormat('Y-m-d H:i:s', $model->thoi_gian_hop_dong_tu)->format('i'),
                                            $phuts,
                                            ['class' => 'form-control custom-select', 'id' => 'phut_vao']
                                        ) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="field-label">Thời gian thuê đến <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?= \common\models\myAPI::activeDateField2(
                                            $form, $model, 'thoi_gian_hop_dong_den',
                                            'Đến ngày', '2020:2050',
                                            ['class' => 'form-control den_ngay', 'value' => $model->thoi_gian_hop_dong_den]
                                        ) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <br>
                                        <span style="font-weight: bold">Giờ ra</span>
                                        <?= Html::dropDownList(
                                            'gio_ra',
                                            $model->isNewRecord ? date('H') : DateTime::createFromFormat('Y-m-d H:i:s', $model->thoi_gian_hop_dong_den)->format('H'),
                                            $gios,
                                            ['class' => 'form-control custom-select', 'id' => 'gio_ra']
                                        ) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <br>
                                        <span style="font-weight: bold">Phút ra</span>
                                        <?= Html::dropDownList(
                                            'phut_ra',
                                            $model->isNewRecord ? date('i') : DateTime::createFromFormat('Y-m-d H:i:s', $model->thoi_gian_hop_dong_den)->format('i'),
                                            $phuts,
                                            ['class' => 'form-control custom-select', 'id' => 'phut_ra']
                                        ) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tài liệu và ghi chú -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-file mr-2"></i> Tài liệu và ghi chú
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="field-label">File(s) hợp đồng</label>
                            <div class="file-upload">
                                <?= Html::fileInput('file_hop_dong[]', null, [
                                    'multiple' => 'multiple',
                                    'class' => 'file-upload-input custom-file-input',
                                    'id' => 'file-hop-dong'
                                ]) ?>
                                <div class="file-upload-btn">
                                    <div class="file-upload-icon">
                                        <i class="fa fa-cloud-upload"></i>
                                    </div>
                                    <div class="file-upload-text">
                                        Kéo thả file vào đây hoặc click để chọn file
                                    </div>
                                    <div class="text-muted mt-2">
                                        <small>Hỗ trợ: PDF, DOC, DOCX, JPG, PNG</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hiển thị file đã tải lên -->
                        <?php if (!$model->isNewRecord && !empty($anhHopDongs)): ?>
                            <div class="row mt-3 mb-3">
                                <div class="col-12">
                                    <h6 class="field-label">File đã tải lên</h6>
                                </div>

                                <?php foreach ($anhHopDongs as $anhHopDong): ?>
                                    <?php
                                    $ext = strtolower(pathinfo($anhHopDong, PATHINFO_EXTENSION));
                                    $isDocument = in_array($ext, ['pdf', 'doc', 'docx']);
                                    $fileUrl = $domain . '/hinh-anh/' . rawurlencode($anhHopDong);
                                    $icon = ($ext === 'pdf') ? 'pdf.png' : 'word.png';
                                    ?>
                                    <div class="col-sm-6 col-lg-4 mb-3">
                                        <div class="file-preview">
                                            <?php if ($isDocument): ?>
                                                <!-- Document preview -->
                                                <div class="text-center pt-4 pb-2">
                                                    <a href="<?= $fileUrl ?>" download title="Tải xuống <?= Html::encode($anhHopDong) ?>">
                                                        <?= Html::img("{$domain}/hinh-anh/{$icon}", [
                                                            'width' => '60px',
                                                            'class' => 'img-fluid',
                                                            'alt' => 'Tài liệu'
                                                        ]) ?>
                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                <!-- Image preview -->
                                                <a href="<?= $fileUrl ?>" class="example-image-link" data-lightbox="roadtrip" target="_blank">
                                                    <?= Html::img($fileUrl, [
                                                        'class' => 'img-fluid',
                                                        'alt' => 'Ảnh hợp đồng'
                                                    ]) ?>
                                                </a>
                                            <?php endif; ?>

                                            <div class="file-info">
                                                <div class="file-name" title="<?= Html::encode($anhHopDong) ?>">
                                                    <?= Html::encode(strlen($anhHopDong) > 20 ? substr($anhHopDong, 0, 17) . '...' : $anhHopDong) ?>
                                                </div>
                                                <div class="file-type">
                                                    <?= strtoupper($ext) ?> - <?= $isDocument ? 'Tài liệu' : 'Hình ảnh' ?>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <a href="<?= $fileUrl ?>" class="btn btn-sm btn-outline-primary" download>
                                                        <i class="fa fa-download"></i> Tải xuống
                                                    </a>
                                                    <?= Html::a('<i class="fa fa-trash"></i> Xóa', '#', [
                                                        'class' => 'btn btn-sm btn-outline-danger text-danger btn-xoa-anh-json',
                                                        'data-value' => $anhHopDong,
                                                        'data-loai' => 'anh_hop_dong'
                                                    ]) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

<!--                        <div class="form-group mt-4">-->
<!--                            <label class="field-label">Ảnh chuyển khoản</label>-->
<!--                            <div class="file-upload">-->
<!--                                --><?php //= Html::fileInput('anh_chuyen_khoan[]', null, [
//                                    'multiple' => 'multiple',
//                                    'class' => 'file-upload-input custom-file-input',
//                                    'id' => 'anh-chuyen-khoan'
//                                ]) ?>
<!--                                <div class="file-upload-btn">-->
<!--                                    <div class="file-upload-icon">-->
<!--                                        <i class="fa fa-credit-card"></i>-->
<!--                                    </div>-->
<!--                                    <div class="file-upload-text">-->
<!--                                        Tải lên ảnh chuyển khoản-->
<!--                                    </div>-->
<!--                                    <div class="text-muted mt-2">-->
<!--                                        <small>Hỗ trợ: JPG, PNG</small>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="form-group mt-4">
                            <?= $form->field($model, 'ghi_chu')
                                ->textarea([
                                    'rows' => 4,
                                    'placeholder' => 'Nhập ghi chú về hợp đồng này...',
                                    'class' => 'form-control'
                                ])
                                ->label('Ghi chú:')
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Thông tin môi giới -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fa fa-handshake-o mr-2"></i> Thông tin môi giới
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" id="toggle-moi-gioi">
                            <?= (!$model->isNewRecord && $model->moi_gioi > 0) ? 'Hiển thị thông tin môi giới' : 'Thêm thông tin môi giới' ?>
                        </button>
                    </div>

                    <div class="card-body" id="block-moi-gioi" style="display: <?= (!$model->isNewRecord && $model->moi_gioi > 0) ? 'block' : 'none' ?>;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="field-label">Môi giới <span class="text-danger">*</span></label>
                                    <?= Html::activeTextInput($model, 'moi_gioi', [
                                        'class' => 'form-control text-right hien_thi_tien',
                                        'value' => number_format($model->moi_gioi, 0, ',', '.')
                                    ]) ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="field-label">Kiểu môi giới <span class="text-danger">*</span></label>
                                    <?= Html::activeDropDownList($model, 'kieu_moi_gioi', [
                                        '%' => '%',
                                        'số tiền' => 'Số tiền'
                                    ], ['class' => 'form-control custom-select']) ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="field-label">Số tiền môi giới</label>
                                    <div class="form-control-plaintext font-weight-bold text-right" id="so_tien_moi_gioi">
                                        <?= $model->isNewRecord ? '0' : number_format($model->so_tien_moi_gioi, 0, '', '.') ?> đ
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="field-label">Đã thanh toán môi giới</label>
                                    <?= Html::activeTextInput($model, 'da_thanh_toan_moi_gioi', [
                                        'class' => 'form-control text-right hien_thi_tien',
                                        'value' => number_format($model->da_thanh_toan_moi_gioi, 0, ',', '.')
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Info Block -->
                <div id="block-thong-tin"></div>
            </div>

            <!-- Sidebar - Tính toán tiền -->
            <div class="col-md-4">
                <!-- Calendar Widget -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-calendar-check-o mr-2"></i> Lịch
                    </div>
                    <div class="card-body p-0">
                        <div id="calendar"></div>
                    </div>
                </div>

                <!-- Tính toán chi phí -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-calculator mr-2"></i> Chi phí hợp đồng
                    </div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <tr id="block-don-gia">
                                <td class="field-label">Đơn giá:</td>
                                <td class="text-right font-weight-bold" id="don_gia">
                                    <?= $model->isNewRecord ? '0' : number_format($model->don_gia, 0, '', '.') ?> đ
                                </td>
                            </tr>

                            <!-- Số tháng và tổng tiền chỉ hiển thị nếu là hợp đồng theo tháng -->
                            <tbody id="block-so-thang" <?= (!$model->isNewRecord && $model->loai_hop_dong == 'thang') ? '' : 'style="display:none"' ?>>
                            <tr>
                                <td class="field-label">Số tháng:</td>
                                <td class="text-right font-weight-bold" id="so_thang">
                                    <?= $model->isNewRecord ? '0' : $model->so_thang_hop_dong ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="field-label">Tổng tiền:</td>
                                <td class="text-right font-weight-bold" id="tong_tien">
                                    <?= $model->isNewRecord ? '0' : number_format($model->don_gia * $model->so_thang_hop_dong, 0, '', '.') ?> đ
                                </td>
                            </tr>
                            </tbody>

                            <tr>
                                <td class="field-label">Chiết khấu: <span class="text-danger">*</span></td>
                                <td>
                                    <?= Html::activeTextInput($model, 'chiet_khau', [
                                        'class' => 'form-control form-control-sm text-right hien_thi_tien',
                                        'value' => number_format($model->chiet_khau, 0, ',', '.')
                                    ]) ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="field-label">Kiểu chiết khấu: <span class="text-danger">*</span></td>
                                <td id="kieu_chiet_khau" class="text-right">
                                    <?= Html::activeDropDownList($model, 'kieu_chiet_khau', [
                                        '%' => '%',
                                        'số tiền' => 'Số tiền'
                                    ], ['class' => 'form-control form-control-sm custom-select']) ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="field-label">Số tiền chiết khấu:</td>
                                <td id="so_tien_chiet_khau" class="text-right font-weight-bold">
                                    <?= $model->isNewRecord ? '0' : number_format($model->so_tien_chiet_khau, 0, '', '.') ?> đ
                                </td>
                            </tr>

                            <tr class="table-success">
                                <td class="field-label text-uppercase">
                                    <strong>Thành tiền:</strong>
                                </td>
                                <td id="thanh_tien_sau_chiet_khau" class="text-right text-success font-weight-bold h5 mb-0">
                                    <?= $model->isNewRecord ? '0' : number_format($model->don_gia * $model->so_thang_hop_dong - $model->so_tien_chiet_khau, 0, '', '.') ?> đ
                                </td>
                            </tr>

                            <tr>
                                <td class="field-label">Tiền cọc:</td>
                                <td id="tien-coc" class="text-right">
                                    <?= Html::activeTextInput($model, 'coc_truoc', [
                                        'class' => 'form-control form-control-sm text-right hien_thi_tien',
                                        'value' => number_format($model->coc_truoc, 0, ',', '.')
                                    ]) ?>
                                    <?= Html::hiddenInput('change', $model->isNewRecord ? '' : $model->coc_truoc, ['id' => 'coc-ban-dau']) ?>
                                </td>
                            </tr>

                            <tr class="table-warning">
                                <td class="field-label text-uppercase"><strong>Còn lại:</strong></td>
                                <td id="con-lai-phai-tra" class="text-right font-weight-bold h5 mb-0 text-danger">
                                    <?= $model->isNewRecord ? '0' : number_format($model->thanh_tien - $model->coc_truoc, 0, '', '.') ?> đ
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Nút hành động -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <?= Html::a('<i class="fa fa-floppy-o"></i> Lưu lại', '#', [
                                'class' => $model->isNewRecord ? 'btn btn-success btn-lg btn-block btn-save-hop-dong' : 'btn btn-success btn-lg btn-block btn-update-hop-dong'
                            ]) ?>

                            <?= Html::a('<i class="fa fa-arrow-left"></i> Quay lại danh sách', '#', [
                                'class' => 'btn btn-outline-primary btn-block mt-2',
                                'id' => 'btn-quay-lai-danh-sach'
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <!-- JavaScript để cải thiện trải nghiệm người dùng -->
<?php
$this->registerJs("
    // Định dạng số tiền khi nhập
    $('.hien_thi_tien').on('input', function() {
        // Loại bỏ tất cả những ký tự không phải số
        var value = $(this).val().replace(/[^0-9]/g, '');
        
        // Định dạng số với dấu chấm phân cách hàng nghìn
        if (value !== '') {
            value = parseInt(value, 10).toLocaleString('vi-VN');
        }
        
        // Cập nhật giá trị vào input
        $(this).val(value);
    });
    
    // Hiệu ứng cho file upload
    $('.file-upload-input').on('change', function() {
        var fileCount = this.files.length;
        var fileUploadText = $(this).siblings('.file-upload-btn').find('.file-upload-text');
        
        if (fileCount > 0) {
            fileUploadText.text(fileCount + ' file đã được chọn');
            $(this).siblings('.file-upload-btn').css('border-color', '#0cbc87');
        } else {
            fileUploadText.text('Kéo thả file vào đây hoặc click để chọn file');
            $(this).siblings('.file-upload-btn').css('border-color', '#dee2e6');
        }
    });
    
    // Animation khi trang tải xong
    $(document).ready(function() {
        $('.card').hide().each(function(index) {
            $(this).delay(100 * index).fadeIn(500);
        });
    });
    
    // Hiệu ứng highlight khi thay đổi giá trị
    $('.form-control').on('change', function() {
        $(this).addClass('highlight-change');
        setTimeout(() => {
            $(this).removeClass('highlight-change');
        }, 1000);
    });
");
?>

    <!-- CSS tiếp theo -->
<?php
$this->registerCss("
    /* Animation khi thay đổi giá trị */
    @keyframes highlightChange {
        0% { background-color: rgba(61, 124, 244, 0); }
        50% { background-color: rgba(61, 124, 244, 0.1); }
        100% { background-color: rgba(61, 124, 244, 0); }
    }
    
    .highlight-change {
        animation: highlightChange 1s ease;
    }
    
    /* Responsive tweaks */
    @media (max-width: 992px) {
        .card-header {
            padding: 12px 15px;
        }
        
        .card-body {
            padding: 15px;
        }
        
        .user-info {
            padding: 8px;
        }
    }
    
    @media (max-width: 768px) {
        .phong-khach-form {
            padding: 15px;
            margin-bottom: 10px;
        }
        
        .card {
            margin-bottom: 15px;
        }
    }
    
    /* Print styles */
    @media print {
        .phong-khach-form {
            box-shadow: none;
            padding: 0;
        }
        
        .card {
            box-shadow: none;
            border: 1px solid #dee2e6;
            break-inside: avoid;
        }
        
        .btn {
            display: none !important;
        }
    }
");
?>