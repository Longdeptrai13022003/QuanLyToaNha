<?php
/**
 * Created by PhpStorm.
 * User: hungluong
 * Date: 7/24/17
 * Time: 8:57 AM
 */
?>

<?php \yii\bootstrap\Modal::begin([
    'id' => 'modal-doimatkhau',
    'size' => \yii\bootstrap\Modal::SIZE_DEFAULT,
    'header' => '<h4 class="modal-title">Đổi mật khẩu</h4>',
    'footer' => \common\models\myAPI::getBtnCloseModal() . \yii\bootstrap\Html::a('<i class="fa fa-save mr-1"></i> Thực hiện', '#', ['class' => 'btn btn-primary btn-thuchiendoimatkhau']),
    'options' => ['class' => 'modal-password']
])?>

<?php $this->registerCss("
    .modal-password .modal-content {
        font-family: 'Roboto', sans-serif !important;
        border-radius: 8px !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
        border: none !important;
    }

    .modal-password .modal-header {
        background: linear-gradient(135deg, #3f51b5, #303f9f) !important;
        color: #ffffff !important;
        border-top-left-radius: 8px !important;
        border-top-right-radius: 8px !important;
        padding: 16px 20px !important;
    }

    .modal-password .modal-title {
        font-size: 20px !important;
        font-weight: 600 !important;
    }

    .modal-password .modal-body {
        padding: 20px !important;
        background: #ffffff !important;
    }

    .modal-password .modal-footer {
        border-top: 1px solid #e5e7eb !important;
        padding: 16px 20px !important;
        background: #f8fafc !important;
        border-bottom-left-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
    }

    .modal-password .btn-default {
        height: 40px !important;
        border: 1px solid #d1d5db !important;
        border-radius: 8px !important;
        background: #ffffff !important;
        color: #1f2937 !important;
        font-size: 14px !important;
        font-weight: 500 !important;
        padding: 0 16px !important;
        display: inline-flex !important;
        align-items: center !important;
        transition: all 0.2s ease !important;
    }

    .modal-password .btn-default:hover {
        background: #f1f5f9 !important;
        border-color: #3f51b5 !important;
    }

    .modal-password .btn-primary {
        height: 40px !important;
        border: none !important;
        border-radius: 8px !important;
        background: #3f51b5 !important;
        color: #ffffff !important;
        font-size: 14px !important;
        font-weight: 500 !important;
        padding: 0 16px !important;
        display: inline-flex !important;
        align-items: center !important;
        transition: all 0.2s ease !important;
    }

    .modal-password .btn-primary:hover {
        background: #303f9f !important;
    }

    .modal-password .btn-primary .mr-1 {
        margin-right: 8px !important;
    }

    .modal-password .form-group {
        margin-bottom: 16px !important;
        position: relative !important;
    }

    .modal-password .form-group label {
        font-size: 14px !important;
        font-weight: 500 !important;
        color: #1f2937 !important;
        margin-bottom: 8px !important;
        display: block !important;
    }

    .modal-password .form-group .form-control {
        height: 40px !important;
        border: 1px solid #d1d5db !important;
        border-radius: 8px !important;
        font-size: 14px !important;
        color: #1f2937 !important;
        padding: 0 12px !important;
        transition: all 0.2s ease !important;
        background: #ffffff !important;
        width: 100% !important;
    }

    .modal-password .form-group .form-control:focus {
        border-color: #3f51b5 !important;
        box-shadow: 0 0 6px rgba(63, 81, 181, 0.3) !important;
        outline: none !important;
    }

    .modal-password .form-group .form-control::placeholder {
        color: #9ca3af !important;
    }

    .modal-password .thongbao {
        margin-bottom: 20px !important;
        padding: 12px !important;
        border-radius: 8px !important;
        background: #f8fafc !important;
        border: 1px solid #e5e7eb !important;
        font-size: 14px !important;
        color: #1f2937 !important;
        display: none !important; 
    }

    @media (max-width: 767px) {
        .modal-password .modal-content {
            margin: 10px !important;
        }

        .modal-password .modal-header {
            padding: 12px 16px !important;
        }

        .modal-password .modal-title {
            font-size: 18px !important;
        }

        .modal-password .modal-body {
            padding: 16px !important;
        }

        .modal-password .modal-footer {
            padding: 12px 16px !important;
        }

        .modal-password .btn-default,
        .modal-password .btn-primary {
            height: 36px !important;
            font-size: 13px !important;
            padding: 0 12px !important;
        }

        .modal-password .form-group {
            margin-bottom: 12px !important;
        }

        .modal-password .form-group label {
            font-size: 13px !important;
            margin-bottom: 6px !important;
        }

        .modal-password .form-group .form-control {
            height: 36px !important;
            font-size: 13px !important;
            padding: 0 10px !important;
        }

        .modal-password .thongbao {
            font-size: 13px !important;
            padding: 10px !important;
            margin-bottom: 16px !important;
        }
    }
");

// Register Font Awesome and Google Fonts
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
$this->registerCssFile('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
?>

<?php $form = \yii\bootstrap\ActiveForm::begin([
    'options' => ['id' => 'form-doimatkhau']
])?>
    <div class="thongbao"></div>
    <div class="form-group">
        <?= \yii\bootstrap\Html::label('Mật khẩu cũ', 'mat-khau-cu') ?>
        <?= \yii\bootstrap\Html::textInput('matkhaucu', null, ['type' => 'password', 'class' => 'form-control', 'id' => 'mat-khau-cu', 'placeholder' => 'Nhập mật khẩu cũ']) ?>
    </div>
    <div class="form-group">
        <?= \yii\bootstrap\Html::label('Mật khẩu mới', 'mat-khau-moi') ?>
        <?= \yii\bootstrap\Html::textInput('matkhaumoi', null, ['type' => 'password', 'class' => 'form-control', 'id' => 'mat-khau-moi', 'placeholder' => 'Nhập mật khẩu mới']) ?>
    </div>
    <div class="form-group">
        <?= \yii\bootstrap\Html::label('Nhập lại mật khẩu mới', 'nhap-lai-matkhaumoi') ?>
        <?= \yii\bootstrap\Html::textInput('nhaplaimatkhaumoi', null, ['type' => 'password', 'class' => 'form-control', 'id' => 'nhap-lai-matkhaumoi', 'placeholder' => 'Nhập lại mật khẩu mới']) ?>
    </div>
<?php \yii\bootstrap\ActiveForm::end() ?>
<?php \yii\bootstrap\Modal::end(); ?>