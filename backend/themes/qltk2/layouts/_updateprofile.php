<?php
/**
 * Created by PhpStorm.
 * User: hungluong
 * Date: 7/24/17
 * Time: 8:57 AM
 */
?>
<?php \yii\bootstrap\Modal::begin([
    'id' => 'modal-updateProfile',
    'size' => \yii\bootstrap\Modal::SIZE_DEFAULT,
    'header' => '<h4 class="modal-title">Thông tin cá nhân</h4>',
    'footer' => \common\models\myAPI::getBtnCloseModal() .
        \yii\bootstrap\Html::a('<i class="fa fa-save mr-1"></i> Lưu lại', '#', [
            'class' => 'btn btn-primary btn-saveProfile'
        ]),
    'options' => ['class' => 'modal-profile']
]); ?>

<?php $this->registerCss("
    .modal-profile .modal-content {
        font-family: 'Roboto', sans-serif !important;
        border-radius: 10px !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
        border: none !important;
    }

    .modal-profile .modal-header {
        background: linear-gradient(135deg, #3f51b5, #303f9f) !important;
        color: #ffffff !important;
        border-top-left-radius: 8px !important;
        border-top-right-radius: 8px !important;
        padding: 16px 20px !important;
    }

    .modal-profile .modal-title {
        font-size: 20px !important;
        font-weight: 600 !important;
    }

    .modal-profile .modal-body {
        padding: 20px !important;
        background: #ffffff !important;
    }

    .modal-profile .modal-footer {
        border-top: 1px solid #e5e7eb !important;
        padding: 16px 20px !important;
        background: #f8fafc !important;
        border-bottom-left-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
    }

    .modal-profile .btn-default {
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

    .modal-profile .btn-default:hover {
        background: #f1f5f9 !important;
        border-color: #3f51b5 !important;
    }

    .modal-profile .btn-primary {
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

    .modal-profile .btn-primary:hover {
        background: #303f9f !important;
    }

    .modal-profile .btn-primary .mr-1 {
        margin-right: 8px !important;
    }

    .profile-picture {
        margin-bottom: 20px !important;
    }

    .profile-picture img {
        width: 150px !important;
        height: 150px !important;
        object-fit: cover !important;
        border-radius: 50% !important;
        border: 4px solid #ffffff !important;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1) !important;
        transition: transform 0.3s ease !important;
    }

    .profile-picture img:hover {
        transform: scale(1.05) !important;
    }

    .form-horizontal .form-group {
        margin-bottom: 16px !important;
        display: flex !important;
        align-items: center !important;
    }

    .form-horizontal .control-label {
        font-size: 14px !important;
        font-weight: 500 !important;
        color: #1f2937 !important;
        text-align: right !important;
        padding-right: 15px !important;
    }

    .form-horizontal .form-control {
        height: 40px !important;
        border: 1px solid #d1d5db !important;
        border-radius: 8px !important;
        font-size: 14px !important;
        color: #1f2937 !important;
        padding: 0 12px !important;
        transition: all 0.2s ease !important;
        background: #ffffff !important;
    }

    .form-horizontal .form-control:focus {
        border-color: #3f51b5 !important;
        box-shadow: 0 0 6px rgba(63, 81, 181, 0.3) !important;
        outline: none !important;
    }

    .form-horizontal .form-control-static {
        font-size: 14px !important;
        color: #6b7280 !important;
        line-height: 40px !important;
        padding: 0 !important;
    }

    .form-horizontal .form-control::placeholder {
        color: #9ca3af !important;
    }

    .form-horizontal h4 {
        font-size: 16px !important;
        font-weight: 600 !important;
        color: #ffffff !important;
        background: linear-gradient(135deg, #3f51b5, #303f9f) !important;
        padding: 12px 16px !important;
        border-radius: 8px !important;
        margin: 20px 0 16px !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
    }

    .thongbao {
        margin-bottom: 20px !important;
        padding: 12px !important;
        border-radius: 8px !important;
        background: #f8fafc !important;
        border: 1px solid #e5e7eb !important;
        font-size: 14px !important;
        color: #1f2937 !important;
        display: none !important; /* Ẩn mặc định, JS sẽ hiển thị */
    }

    /* Responsive */
    @media (max-width: 767px) {
        .modal-profile .modal-content {
            margin: 10px !important;
        }

        .modal-profile .modal-header {
            padding: 12px 16px !important;
        }

        .modal-profile .modal-title {
            font-size: 18px !important;
        }

        .modal-profile .modal-body {
            padding: 16px !important;
        }

        .modal-profile .modal-footer {
            padding: 12px 16px !important;
        }

        .modal-profile .btn-default,
        .modal-profile .btn-primary {
            height: 36px !important;
            font-size: 13px !important;
            padding: 0 12px !important;
        }

        .profile-picture img {
            width: 120px !important;
            height: 120px !important;
            border-width: 3px !important;
        }

        .form-horizontal .form-group {
            flex-direction: column !important;
            align-items: flex-start !important;
            margin-bottom: 12px !important;
        }

        .form-horizontal .control-label {
            text-align: left !important;
            padding: 0 0 8px 0 !important;
            font-size: 13px !important;
        }

        .form-horizontal .form-control,
        .form-horizontal .form-control-static {
            font-size: 13px !important;
            height: 36px !important;
            line-height: 36px !important;
            width: 100% !important;
        }

        .form-horizontal h4 {
            font-size: 15px !important;
            padding: 10px 12px !important;
            margin: 16px 0 12px !important;
        }

        .thongbao {
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
    'options' => [
        'id' => 'form-updateProfile',
        'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data'
    ]
]); ?>

    <div class="thongbao"></div>
    <div class="row">
        <div class="col-sm-4">
            <div class="profile-picture text-center">
                <?php
                $avatar = Yii::$app->user->isGuest
                    ? '/images/no-avatar.png'
                    : \yii\helpers\Url::to('@web/hinh-anh/' . Yii::$app->user->identity->anhdaidien);
                ?>
                <img src="<?= $avatar ?>" alt="Avatar" class="img-responsive img-circle">
            </div>
        </div>

        <div class="col-sm-8">
            <div class="form-group">
                <?= \yii\bootstrap\Html::label('Họ tên:', 'hoTen', ['class' => 'col-sm-3 control-label']) ?>
                <div class="col-sm-9">
                    <?= \yii\bootstrap\Html::textInput('hoTen', \common\models\User::find()->where(['id' => Yii::$app->user->id])->select('hoten')->scalar(), ['class' => 'form-control', 'id' => 'hoTen', 'placeholder' => 'Nhập họ tên']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Tên đăng nhập:</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= \common\models\User::find()->where(['id' => Yii::$app->user->id])->select('username')->scalar() ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Điện thoại:</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= \common\models\User::find()->where(['id' => Yii::$app->user->id])->select('dien_thoai')->scalar() ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Email:</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= \common\models\User::find()->where(['id' => Yii::$app->user->id])->select('email')->scalar() ?></p>
                </div>
            </div>
            <div class="form-group">
                <?= \yii\bootstrap\Html::label('Ngày sinh:', 'ngaySinh', ['class' => 'col-sm-3 control-label']) ?>
                <div class="col-sm-9">
                    <?= \common\models\myAPI::dateField2('ngaySinh', \common\models\User::find()->where(['id' => Yii::$app->user->id])->select('birth_day')->scalar(), '1900:' . date("Y"), ['class' => 'form-control', 'id' => 'ngaySinh', 'placeholder' => 'Chọn ngày sinh']) ?>
                </div>
            </div>
            <h4>TÀI KHOẢN NGÂN HÀNG</h4>
            <div class="form-group">
                <?= \yii\bootstrap\Html::label('Tên tài khoản:', 'tenTaiKhoan', ['class' => 'col-sm-3 control-label']) ?>
                <div class="col-sm-9">
                    <?= \yii\bootstrap\Html::textInput('tenTaiKhoan', \common\models\User::find()->where(['id' => Yii::$app->user->id])->select('ho_ten_tai_khoan')->scalar(), ['class' => 'form-control', 'id' => 'tenTaiKhoan', 'placeholder' => 'Nhập tên tài khoản']) ?>
                </div>
            </div>
            <div class="form-group">
                <?= \yii\bootstrap\Html::label('Số tài khoản:', 'soTaiKhoan', ['class' => 'col-sm-3 control-label']) ?>
                <div class="col-sm-9">
                    <?= \yii\bootstrap\Html::textInput('soTaiKhoan', \common\models\User::find()->where(['id' => Yii::$app->user->id])->select('so_tai_khoan')->scalar(), ['class' => 'form-control', 'id' => 'soTaiKhoan', 'placeholder' => 'Nhập số tài khoản']) ?>
                </div>
            </div>
            <div class="form-group">
                <?= \yii\bootstrap\Html::label('Tên ngân hàng:', 'tenNganHang', ['class' => 'col-sm-3 control-label']) ?>
                <div class="col-sm-9">
                    <?= \yii\bootstrap\Html::textInput('tenNganHang', \common\models\User::find()->where(['id' => Yii::$app->user->id])->select('te_ngan_hang')->scalar(), ['class' => 'form-control', 'id' => 'tenNganHang', 'placeholder' => 'Nhập tên ngân hàng']) ?>
                </div>
            </div>
        </div>
    </div>

<?php \yii\bootstrap\ActiveForm::end(); ?>
<?php \yii\bootstrap\Modal::end(); ?>