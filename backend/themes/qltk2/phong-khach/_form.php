<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

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
use yii\helpers\Url;
$domain = Url::base(true);
?>
<?php
$this->registerCss("
    .phong-khach-form .form-group label {
        font-weight: 600 !important;
        color: #333 !important;
    }

    .phong-khach-form input.form-control,
    .phong-khach-form select.form-control,
    .phong-khach-form textarea.form-control {
        border-radius: 6px !important;
        border: 1px solid #ccc !important;
        transition: border-color 0.3s ease !important;
    }

    .phong-khach-form .form-control:focus {
        border-color: #007bff !important;
        box-shadow: 0 0 4px rgba(0,123,255,0.5) !important;
    }

    .phong-khach-form .padding-top-35 {
        padding-top: 35px !important;
    }

    .phong-khach-form .btn-primary, .btn-success {
        border-radius: 4px !important;
        margin-bottom: 5px !important;
    }

    .phong-khach-form #block-moi-gioi {
        margin-top: 15px !important;
        border-top: 1px solid #ddd !important;
        padding-top: 15px !important;
        background-color: #f9f9f9 !important;
    }

    .phong-khach-form table td {
        vertical-align: middle !important;
        padding: 6px 8px !important;
    }

    .phong-khach-form .img-thumbnail {
        max-height: 150px !important;
        margin-bottom: 10px !important;
    }
");
?>

<div class="phong-khach-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'autocomplete' => 'off',
            'enctype'=> 'multipart/form-data',
            'id'=>'form-them-hop-dong'
        ]
    ]); ?>
    <?=Html::activeHiddenInput($model,'khach_hang_id') ?>
    <?=Html::activeHiddenInput($model,'sale_id') ?>
    <?=$model->isNewRecord ? '' : Html::HiddenInput('hop_dong_id',$model->id,['id'=>'hop_dong_id']) ?>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model,'loai_hop_dong')->dropDownList($packages,['prompt'=>'Tất cả'])->label('Chọn gói thuê <span class="text-danger">*</span>')?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'ma_hop_dong')->label('Mã hợp đồng <span class="text-danger">*</span>')->textInput(['value'=>$model->ma_hop_dong,'readonly'=>'readonly']) ?>
                </div>
                <div class="col-md-3">
                    <p class="padding-top-35">
                        <?= Html::a('<i class="fa fa-check-circle"></i> Chọn KH','#',[
                            'class' => 'btn btn-primary',
                            'id' => 'btn-chon-khach-hang',
                        ])?>
                        <?= Html::a('<i class="fa fa-plus"></i> Thêm KH','#',[
                            'class' => 'btn btn-primary',
                            'id' => 'btn-them-khach-hang',
                        ])?><br/>
                        <span id="khach-hang-da-chon"><?=$model->isNewRecord ? '' : '<strong>Khách:</strong> '.$khach->hoten.' ('.$khach->dien_thoai.') <a href="#" class="text-danger" id="xoa-khach-da-chon"><i class="fa fa-close"></i> Xóa</a>'?></span>
                    </p>
                </div>
                <div class="col-md-5">
                    <p class="padding-top-35">
                        <?= Html::a('<i class="fa fa-check-circle"></i> Chọn Sale','#',[
                            'class' => 'btn btn-primary',
                            'id' => 'btn-chon-sale',
                        ])?>
                        <?= Html::a('<i class="fa fa-plus"></i> Thêm Sale','#',[
                            'class' => 'btn btn-primary',
                            'id' => 'btn-them-sale',
                        ])?><br/>
                        <span id="sale-da-chon">
                            <?php if (!$model->isNewRecord && $model->sale_id != null): ?>
                            <?='<strong>Sale:</strong> '.$sale->hoten.' ('.$sale->dien_thoai.') <a href="#" class="text-danger" id="xoa-sale-da-chon"><i class="fa fa-close"></i> Xóa</a>'?>
                            <?php endif;?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <?= Html::label('Tòa nhà <span class="text-danger">*</span>','toa-nha-selection')?>
                        <?= Html::dropDownList('toa_nha_id',$model->isNewRecord ? null : $phong->parent_id,$toanhaids,['prompt'=>'-- Chọn --','class'=>'form-control','id'=>'toa-nha-id']);?>
                    </div>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model,'phong_id')->dropDownList($model->isNewRecord ? [] : $phongids)->label('Chọn phòng <span class="text-danger">*</span>')?>
                </div>
                <div class="col-md-3">
                    <table>
                        <tr>
                            <td width="44%"><?= \common\models\myAPI::activeDateField2($form,$model,'thoi_gian_hop_dong_tu','Từ ngày <span class="text-danger">*</span>','2020:2050',['class'=>'form-control tu_ngay','value'=>$model->thoi_gian_hop_dong_tu]) ?></td>
                            <td width="28%"><?= Html::dropDownList('gio_vao',$model->isNewRecord ? date('H') : DateTime::createFromFormat('Y-m-d H:i:s',$model->thoi_gian_hop_dong_tu)->format('H'),$gios,['class' => 'form-control margin-top-25','id'=>'gio_vao'])?></td>
                            <td width="38%"><?= Html::dropDownList('phut_vao',$model->isNewRecord ? date('H') : DateTime::createFromFormat('Y-m-d H:i:s',$model->thoi_gian_hop_dong_tu)->format('i'),$phuts,['class' => 'form-control margin-top-25','id'=>'phut_vao'])?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-3">
                    <table>
                        <tr>
                            <td width="44%"><?= \common\models\myAPI::activeDateField2($form,$model,'thoi_gian_hop_dong_den','Đến ngày <span class="text-danger">*</span>','2020:2050',['class'=>'form-control den_ngay','value'=>$model->thoi_gian_hop_dong_den]) ?></td>
                            <td width="28%"><?= Html::dropDownList('gio_ra',$model->isNewRecord ? date('H') : DateTime::createFromFormat('Y-m-d H:i:s',$model->thoi_gian_hop_dong_den)->format('H'),$gios,['class' => 'form-control margin-top-25','id'=>'gio_ra'])?></td>
                            <td width="28%"><?= Html::dropDownList('phut_ra',$model->isNewRecord ? date('H') : DateTime::createFromFormat('Y-m-d H:i:s',$model->thoi_gian_hop_dong_den)->format('i'),$phuts,['class' => 'form-control margin-top-25','id'=>'phut_ra'])?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?= Html::label('File(s) hợp đồng')?>
                        <?= Html::fileInput('file_hop_dong[]',null,['multiple'=>'multiple','class'=>'form-control'])?>
                    </div>
                    <div class="row">
                        <?php if (!$model->isNewRecord):?>

                            <?php foreach ($fileHDs as $fileHD):?>
                                <?php
                                $isWord = in_array(pathinfo($fileHD->file, PATHINFO_EXTENSION), ['doc', 'docx', 'pdf']);
                                $fileUrl = $domain.'/hinh-anh/' . $fileHD->file;
                                ?>
                                <div class="col-md-6 text-center">
                                    <?php if ($isWord): ?>
                                        <a href="<?= $fileUrl ?>" download>
                                            <?= Html::img($domain.'/hinh-anh/word.png',[
                                                'width' => '100px',
                                                'class' => 'img-thumbnail img-responsive',
                                                'id' => 'hinh-anh',
                                            ])?>
                                        </a>
                                        <div>
                                            <?= Html::encode($fileHD->file) ?>
                                        </div>
                                        <?=Html::a('<i class="fa fa-trash"></i> Xóa','#', [
                                            'class' => 'text-danger margin-top-5',
                                            'id' => 'btn-xoa-anh-hop-dong',
                                            'data-value' => $fileHD->id,
                                        ]) ?>
                                    <?php else: ?>
                                        <?= Html::img($domain.'/hinh-anh/'.$fileHD->file,[
                                            'width' => '300px',
                                            'class' => 'img-thumbnail img-responsive',
                                            'id' => 'hinh-anh',
                                        ])?>
                                        <div class="text-center">
                                            <?= Html::encode($fileHD->file) ?>
                                        </div>
                                        <?=Html::a('<i class="fa fa-trash"></i> Xóa','#', [
                                            'class' => 'text-danger margin-top-5',
                                            'id' => 'btn-xoa-anh-hop-dong',
                                            'data-value' => $fileHD->id,
                                        ]) ?>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
                    <div class="form-group">
                        <?= Html::label('Ảnh chuyển khoản')?>
                        <?= Html::fileInput('anh_chuyen_khoan[]',null,['multiple'=>'multiple', 'class'=>'form-control', 'id'=>'anh-chuyen-khoan'])?>
                    </div>
                    <?=$form->field($model,'ghi_chu')->textarea()->label('Ghi chú:')?>
                </div>

                <div class="col-md-6">
                    <br/>
                    <button type="button" class="btn btn-primary" id="toggle-moi-gioi">
                        Thêm thông tin môi giới
                    </button>

                    <div id="block-moi-gioi" style="display: none;">
                        <table class="table text-nowrap">
                            <tr>
                                <td>Môi giới: <span class="text-danger">*</span></td>
                                <td><?= Html::activeTextInput($model,'moi_gioi',[
                                        'class'=>'form-control text-right hien_thi_tien',
                                        'value' => number_format($model->moi_gioi, 0, ',', '.')
                                    ]) ?></td>
                            </tr>
                            <tr>
                                <td>Kiểu môi giới: <span class="text-danger">*</span></td>
                                <td id="kieu_moi_gioi" class="text-right">
                                    <?= Html::activeDropDownList($model,'kieu_moi_gioi',[
                                        '%'=>'%',
                                        'số tiền'=>'Số tiền'
                                    ],['class'=>'form-control']) ?></td>
                            </tr>
                            <tr>
                                <td>Số tiền môi giới: </td>
                                <td id="so_tien_moi_gioi" class="text-right">
                                    <?= $model->isNewRecord ? '' : number_format($model->so_tien_moi_gioi, 0, '', '.')?>
                                </td>
                            </tr>
                            <tr>
                                <td>Đã thanh toán MG: </td>
                                <td id="tien-moi-gioi" class="text-right">
                                    <?=Html::activeTextInput($model,'da_thanh_toan_moi_gioi',[
                                        'class'=>'form-control text-right hien_thi_tien',
                                        'value' => number_format($model->da_thanh_toan_moi_gioi, 0, ',', '.')
                                    ])?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div id="block-thong-tin">

            </div>
<!--            <div id="calendar">-->
<!---->
<!--            </div>-->
        </div>
        <div class="col-md-4">
            <div id="calendar">

            </div>
            <table class="table text-nowrap">
                <tr id="block-don-gia">
                    <td>Đơn giá: </td>
                    <td id="don_gia" class="text-right"><?= $model->isNewRecord ? '' : number_format($model->don_gia, 0, '', '.')?></td>
                </tr>
                <tbody id="block-so-thang">
                <?php if (!$model->isNewRecord && $model->loai_hop_dong == 'thang'):?>
                <tr>
                    <td>Số tháng: </td>
                    <td id="so_thang" class="text-right"><?= $model->isNewRecord ? '' : $model->so_thang_hop_dong?></td>
                </tr>
                <tr>
                    <td>Tổng tiền: </td>
                    <td id="tong_tien" class="text-right"><?= $model->isNewRecord ? '' : number_format($model->don_gia*$model->so_thang_hop_dong, 0, '', '.')?></td>
                </tr>
                <?php endif;?>
                </tbody>
                <tr>
                    <td>Chiết khấu: <span class="text-danger">*</span></td>
                    <td><?= Html::activeTextInput($model,'chiet_khau',[
                            'class'=>'form-control text-right hien_thi_tien',
                            'value' => number_format($model->chiet_khau, 0, ',', '.')
                        ]) ?></td>
                </tr>
                <tr>
                    <td>Kiểu chiết khấu: <span class="text-danger">*</span></td>
                    <td id="kieu_chiet_khau" class="text-right">
                        <?= Html::activeDropDownList($model,'kieu_chiet_khau',[
                            '%'=>'%',
                            'số tiền'=>'Số tiền'
                        ],['class'=>'form-control']) ?></td>
                </tr>
                <tr>
                    <td>Số tiền chiết khấu: </td>
                    <td id="so_tien_chiet_khau" class="text-right">
                        <?= $model->isNewRecord ? '' : number_format($model->so_tien_chiet_khau, 0, '', '.')?>
                    </td>
                </tr>
                <tr>
                    <td class="text-danger"><strong>THÀNH TIỀN: </strong></td>
                    <td id="thanh_tien_sau_chiet_khau" class="text-right text-danger">
                        <?= $model->isNewRecord ? '' : number_format($model->don_gia*$model->so_thang_hop_dong - $model->so_tien_chiet_khau, 0, '', '.')?>
                    </td>
                </tr>
                <tr>
                    <td>Tiền cọc: </td>
                    <td id="tien-coc" class="text-right">
                        <?=Html::activeTextInput($model,'coc_truoc',[
                                'class'=>'form-control text-right hien_thi_tien',
                                'value' => number_format($model->coc_truoc, 0, ',', '.')
                        ])?>
                        <?= Html::hiddenInput('change',$model->isNewRecord ? '' : $model->coc_truoc,['id'=>'coc-ban-dau'])?>
                    </td>
                </tr>
                <tr>
                    <td>CÒN LẠI: </td>
                    <td id="con-lai-phai-tra" class="text-right">
                        <?= $model->isNewRecord ? '' : number_format($model->thanh_tien - $model->coc_truoc, 0, '', '.')?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="margin-top-10">
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <?php if (!Yii::$app->request->isAjax){ ?>
                    <div class="text-right">
                        <div class="form-group">
                            <?= Html::a('<i class="fa fa-floppy-o"></i> Lưu lại','#',['class'=> $model->isNewRecord ? 'btn btn-success btn-save-hop-dong' : 'btn btn-success btn-update-hop-dong'])?>
                            <?= Html::a('<i class="fa fa-arrow-left"></i> Quay lại danh sách','#',[
                                'class' => 'btn btn-primary',
                                'id'=>'btn-quay-lai-danh-sach'
                            ]) ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php //$this->registerJsFile(Yii::$app->request->baseUrl.'/backend/themes/qltk2/assets/global/plugins/fullcalendar/fullcalendar.min.css',[ 'depends' => ['backend\assets\Qltk2Asset'], 'position' => \yii\web\View::POS_END ]); ?>
<?php //$this->registerJsFile(Yii::$app->request->baseUrl.'/backend/themes/qltk2/assets/global/plugins/fullcalendar/fullcalendar.min.js',[ 'depends' => ['backend\assets\Qltk2Asset'], 'position' => \yii\web\View::POS_END ]); ?>
<?php //$this->registerJsFile(Yii::$app->request->baseUrl.'/backend/themes/qltk2/assets/global/plugins/fullcalendar/fullcalendar.min.js',[ 'depends' => ['backend\assets\Qltk2Asset'], 'position' => \yii\web\View::POS_END ]); ?>
<?php //$this->registerCssFile(Yii::$app->request->baseUrl.'/backend/themes/qltk2/assets/global/plugins/fullcalendar/fullcalendar.min.css');?>

