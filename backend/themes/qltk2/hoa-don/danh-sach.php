<?php
use \yii\helpers\Html;
/* @var $dichVus \backend\models\ThietLapGia[] */
/* @var $results [] */
/* @var $typeHienThi string */
$domain = \backend\models\CauHinh::findOne(['ghi_chu' => 'domain'])->content;
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    .billing-scope {
        font-family: 'Roboto', sans-serif !important;
        background: #ffffff !important;
        padding: 10px !important;
    }

    .billing-scope .container {
        min-width: 90%;
        max-width: 2000px !important;
    }

    .billing-scope .panel {
        min-width: 380px !important;
        background: #f1f5f9 !important;
        border-radius: 16px !important;
        border: 1px solid #ffffff;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1) !important;
        margin-top: 24px !important;
        margin-bottom: 24px !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }


    .billing-scope .panel:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12) !important;
    }

    .billing-scope .panel-heading {
        background: #ffffff !important;
        color: #315731 !important;
        padding: 12px 16px !important;
        font-weight: 600 !important;
        font-size: 16px !important;
        border-radius: 16px 16px 0 0 !important;
        display: grid !important;
        grid-template-columns: auto 1fr auto !important;
        align-items: center !important;
        gap: 12px !important;
        border-bottom: 1px solid #e5e7eb !important;
    }

    .billing-scope .panel-body {
        padding: 16px !important;
    }

    .billing-scope .section-title {
        font-size: 16px !important;
        font-weight: 600 !important;
        color: #1f2937 !important;
        margin: 0 0 12px !important;
    }

    .billing-scope .section-divider {
        border-top: 1px solid #e5e7eb !important;
        margin: 12px 0 !important;
    }

    .billing-scope .status-badge {
        padding: 6px 12px !important;
        border-radius: 20px !important;
        font-size: 12px !important;
        font-weight: 500 !important;
        max-width: 100% !important;
        text-align: center !important;
        overflow-wrap: break-word !important;
        word-break: break-word !important;
        text-overflow: ellipsis !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        background: linear-gradient(135deg, #10b981, #34d399) !important;
        color: #ffffff !important;
    }

    .billing-scope .status-unpaid {
        background: linear-gradient(135deg, #ef4444, #f87171) !important;
        color: #ffffff !important;
    }

    .billing-scope .form-control {
        border-radius: 8px !important;
        border: 1px solid #d1d5db !important;
        padding: 6px 10px !important;
        font-size: 14px !important;
        width: 100% !important;
        max-width: 100% !important;
        transition: border-color 0.2s ease, box-shadow 0.2s ease !important;
    }

    .billing-scope .form-control:focus {
        outline: none !important;
        border-color: #315731 !important;
        box-shadow: 0 0 6px rgba(30, 64, 175, 0.2) !important;
    }

    .billing-scope .form-control::placeholder {
        color: #9ca3af !important;
        font-size: 14px !important;
    }

    .billing-scope .custom-file-input {
        border-radius: 8px !important;
        padding: 5px !important;
        font-size: 14px !important;
        background: #ffffff !important;
        border: 1px solid #d1d5db !important;
        width: 100% !important;
    }

    .billing-scope .img-container {
        width: 60px !important;
        height: 60px !important;
        overflow: hidden !important;
        border-radius: 12px !important;
        border: 1px solid #e5e7eb !important;
        display: inline-block !important;
    }

    .billing-scope .img-preview {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        transition: transform 0.2s ease !important;
    }

    .billing-scope .img-preview:hover {
        transform: scale(1.1) !important;
    }

    .billing-scope .action-link {
        color: #315731 !important;
        text-decoration: none !important;
        font-size: 14px !important;
        transition: color 0.2s ease !important;
        overflow-wrap: break-word !important;
        word-break: break-word !important;
        max-width: 100% !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 4px !important;
    }

    .billing-scope .action-link:hover {
        color: #3b82f6 !important;
    }

    .billing-scope .checkbox-scale {
        transform: scale(1.3) !important;
        accent-color: #315731 !important;
        cursor: pointer;
    }

    .billing-scope .input-group {
        display: flex !important;
        gap: 8px !important;
        flex-wrap: wrap !important;
    }

    .billing-scope .field-container {
        background: #ffffff !important;
        border: 1px solid #e5e7eb !important;
        border-radius: 8px !important;
        padding: 12px !important;
        margin-bottom: 8px !important;
    }

    .billing-scope .field-label {
        font-size: 14px !important;
        font-weight: 500 !important;
        color: #1f2937 !important;
        margin-bottom: 4px !important;
        overflow-wrap: break-word !important;
        word-break: break-word !important;
        max-width: 100% !important;
    }

    .billing-scope .field-value {
        font-size: 14px !important;
        font-weight: 400 !important;
        color: #4b5563 !important;
        line-height: 1.5 !important;
        overflow-wrap: break-word !important;
        word-break: break-word !important;
        max-width: 100% !important;
        text-overflow: ellipsis !important;
    }

    .billing-scope .field-value.important {
        font-weight: 600 !important;
        font-size: 14px !important;
        color: #1e40af !important;
    }

    .billing-scope .field-row {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        margin-bottom: 20px !important;
    }
    .billing-scope .row {
        display: flex;
        flex-wrap: wrap;
    }
    .billing-scope .amount-value {
        color: #1e40af !important;
        font-weight: 600 !important;
    }

    .billing-scope .input-label {
        font-size: 12px !important;
        color: #4b5563 !important;
        margin-bottom: 2px !important;
    }

    .billing-scope .input-wrapper {
        flex: 1 !important;
    }

    @media (max-width: 767px) {
        .billing-scope {
            padding: 8px !important;
        }

        .billing-scope .panel {
            margin-bottom: 12px !important;
        }

        .billing-scope .panel-heading {
            padding: 8px 12px !important;
            font-size: 14px !important;
            grid-template-columns: auto 1fr !important;
            gap: 8px !important;
        }

        .billing-scope .panel-heading .status-badge {
            grid-column: 2 !important;
            justify-self: end !important;
        }

        .billing-scope .panel-body {
            padding: 12px !important;
        }

        .billing-scope .section-title {
            font-size: 14px !important;
            margin-bottom: 8px !important;
        }

        .billing-scope .section-divider {
            margin: 8px 0 !important;
        }

        .billing-scope .input-group {
            flex-direction: column !important;
        }

        .billing-scope .field-row {
            flex-direction: column !important;
            align-items: flex-start !important;
            margin-bottom: 6px !important;
        }

        .billing-scope .field-container {
            padding: 8px !important;
            margin-bottom: 6px !important;
        }

        .billing-scope .img-container {
            width: 50px !important;
            height: 50px !important;
        }

        .billing-scope .field-label {
            font-size: 14px !important;
            margin-bottom: 2px !important;
        }

        .billing-scope .field-value {
            font-size: 12px !important;
        }

        .billing-scope .field-value.important {
            font-size: 14px !important;
        }

        .billing-scope .status-badge {
            padding: 4px 8px !important;
            font-size: 10px !important;
            max-width: 50% !important;
        }

        .billing-scope .form-control {
            font-size: 12px !important;
            padding: 4px 8px !important;
        }

        .billing-scope .custom-file-input {
            font-size: 12px !important;
            padding: 3px !important;
        }

        .billing-scope .action-link {
            font-size: 12px !important;
        }
    }


</style>

<div class="billing-scope">
    <div class="container">
<!--        --><?php //=Html::checkbox('check_all',false,['class'=>'chon-tat-ca checkbox-scale','style'=>'transform: scale(1.5);'])?><!-- Tất cả-->
        <?= Html::checkbox('check_all', false, [
            'id' => 'check_all',
            'class' => 'chon-tat-ca checkbox-scale',
            'style' => 'transform: scale(1.5);'
        ]) ?>
        <label for="check_all" style="margin-left: 8px; cursor: pointer;">Tất cả</label>
        <div class="row">
            <?php foreach ($results as $index => $result): ?>
                <div class="col-sm-4 col-xs-12">
                    <div class="panel" data-id="<?= $result['id'] ?>">
                        <div class="panel-heading">
                            <?php if ($typeHienThi != 'hien_thi'): ?>
                                <div>
                                    <?= Html::checkbox('thanhToan[]', false, [
                                        'value' => $result['id'],
                                        'class' => 'checkbox-scale check-chon'
                                    ]) ?>
                                </div>
                            <?php else: ?>
                                <div></div>
                            <?php endif; ?>
                            <div>
                                <i class="fa fa-door-open"></i> Phòng: <?= $result['phong'] ?> |
                                <i class="fa fa-user"></i>  <?= $result['khach'] ?>
                            </div>
                            <span class="status-badge <?= $result['trang_thai'] == 'GD đã thanh toán' ? '' : 'status-unpaid' ?>">
                                <?= $result['trang_thai'] ?>
                            </span>
                        </div>
                        <div class="panel-body">
                            <!-- Room Info -->
                            <h4 class="section-title">Thông tin phòng</h4>
                            <div class="field-container">
                                <div class="field-row">
                                    <div class="field-label">Tiền phòng</div>
                                    <div class="field-value amount-value"><?= $result['tien_phong'] ?></div>
                                </div>
                                <div class="field-row">
                                    <div class="field-label">Đã thanh toán</div>
                                    <div class="field-value amount-value"><?= $result['da_thanh_toan'] ?></div>
                                </div>
                                <div class="field-row">
                                    <div class="field-label">Tổng tiền</div>
                                    <div class="field-value important amount-value"><?= $result['tong_tien'] ?></div>
                                </div>
                            </div>

                            <div class="section-divider"></div>

                            <!-- Utilities -->
                            <h4 class="section-title">Tiện ích</h4>
                            <div class="field-container">
                                <div class="field-row">
                                    <div class="field-label"><i class="fa fa-image"></i> Ảnh số điện</div>
                                    <?php
                                    $src = $result['anhDien'] == '' ? $domain . '/hinh-anh/no-image.jpg' : $domain . '/hinh-anh/' . $result['anhDien'];
                                    ?>
                                    <div class="img-container">
                                        <?= Html::a(
                                            '<img class="img-preview" src="' . $src . '" alt="Ảnh số điện">',
                                            $src,
                                            ['data-lightbox' => 'roadtrip-' . $index, 'target' => '_blank']
                                        ) ?>
                                    </div>
                                    <div>

                                        <div class="mt-2">
                                            <?= Html::a('<i class="fa fa-trash-o text-danger"></i> Xóa', '#', ['class' => 'action-link xoa-anh']) ?>
                                        </div>
                                        <div class="mt-2">
                                            <?= Html::fileInput('anh_dien', null, ['class' => 'form-control custom-file-input anh-dien']) ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($typeHienThi == 'hien_thi'): ?>
                                    <div class="field-row">
                                        <div class="field-label"><i class="fa fa-bolt"></i> Điện</div>
                                        <div class="field-value"><?= $result['Điện'] ?></div>
                                    </div>
                                    <div class="field-row">
                                        <div class="field-label"><i class="fa fa-droplet"></i> Nước</div>
                                        <div class="field-value"><?= $result['Nước'] ?></div>
                                    </div>
                                <?php elseif ($typeHienThi == 'so_nuoc'): ?>
                                    <div class="field-row">
                                        <div class="field-label"><i class="fa fa-bolt"></i> Điện</div>
                                        <div>
                                            <div class="input-group">
                                                <div class="input-wrapper">
                                                    <div class="input-label">Số đầu</div>
                                                    <?= Html::textInput('dien_dau', $result['dien_dau'], ['class' => 'form-control so-dau', 'placeholder' => 'Số đầu']) ?>
                                                </div>
                                                <div class="input-wrapper">
                                                    <div class="input-label">Số cuối</div>
                                                    <?= Html::textInput('dien_cuoi', $result['dien_cuoi'], ['class' => 'form-control so-cuoi', 'placeholder' => 'Số cuối']) ?>
                                                </div>
                                            </div>
                                            <div class="field-value mt-2">Tiền: <span class="thanh-tien-dien"><?= $result['Điện'] ?></span></div>
                                        </div>
                                    </div>
                                    <div class="field-row">
                                        <div class="field-label"><i class="fa fa-droplet"></i> Nước</div>
                                        <div>
                                            <div class="input-group">
                                                <div class="input-wrapper">
                                                    <div class="input-label">Số đầu</div>
                                                    <?= Html::textInput('nuoc_dau', $result['nuoc_dau'], ['class' => 'form-control so-nuoc-dau', 'placeholder' => 'Số đầu']) ?>
                                                </div>
                                                <div class="input-wrapper">
                                                    <div class="input-label">Số cuối</div>
                                                    <?= Html::textInput('nuoc_cuoi', array_key_exists('nuoc_cuoi', $result) ? $result['nuoc_cuoi'] : '0', ['class' => 'form-control so-nuoc-cuoi', 'placeholder' => 'Số cuối']) ?>
                                                </div>
                                            </div>
                                            <div class="field-value mt-2">Tiền: <span class="thanh-tien-nuoc"><?= array_key_exists('Nước', $result) ? $result['Nước'] : '0' ?></span></div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="field-row">
                                        <div class="field-label"><i class="fa fa-bolt"></i> Điện</div>
                                        <div>
                                            <div class="input-group">
                                                <div class="input-wrapper">
                                                    <div class="input-label">Số đầu</div>
                                                    <?= Html::textInput('dien_dau', $result['dien_dau'], ['class' => 'form-control so-dau', 'placeholder' => 'Số đầu']) ?>
                                                </div>
                                                <div class="input-wrapper">
                                                    <div class="input-label">Số cuối</div>
                                                    <?= Html::textInput('dien_cuoi', $result['dien_cuoi'], ['class' => 'form-control so-cuoi', 'placeholder' => 'Số cuối']) ?>
                                                </div>
                                            </div>
                                            <div class="field-value mt-2">Tiền: <span class="thanh-tien-dien"><?= $result['Điện'] ?></span></div>
                                        </div>
                                    </div>
                                    <div class="field-row">
                                        <div class="field-label"><i class="fa fa-droplet"></i> Nước</div>
                                        <div>
                                            <div class="field-value">
                                                Số người: <span class="so-thanh-vien"><?= $result['so_nguoi'] ?></span>
                                                <?= Html::a('<i class="fa fa-edit"></i>', '#', ['class' => 'text-primary btn-update-member']) ?>
                                            </div>
                                            <div class="field-value mt-2">Tiền: <span class="thanh-tien-nuoc"><?= array_key_exists('Nước', $result) ? $result['Nước'] : '0' ?></span></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="field-row">
                                    <div class="field-label"><i class="fa fa-trash"></i> Rác</div>
                                    <div class="field-value"><?= array_key_exists('Rác', $result) ? $result['Rác'] : '0' ?></div>
                                </div>
                                <div class="field-row">
                                    <div class="field-label"><i class="fa fa-wifi"></i> Internet</div>
                                    <div class="field-value"><?= array_key_exists('Internet', $result) ? $result['Internet'] : '0' ?></div>
                                </div>
                                <div class="field-row">
                                    <div class="field-label"><i class="fa fa-tshirt"></i> Giặt</div>
                                    <div class="field-value"><?= array_key_exists('Giặt', $result) ? $result['Giặt'] : '0' ?></div>
                                </div>
                            </div>

                            <div class="section-divider"></div>

                            <!-- Fees -->
                            <h4 class="section-title">Phí bổ sung</h4>
                            <div class="field-container">
                                <div class="field-row">
                                    <div class="field-label">Phụ phí</div>
                                    <div>
                                        <?= Html::textInput('phu_phi', array_key_exists('Phụ phí', $result) ? $result['Phụ phí'] : '0', ['class' => 'form-control phu-phi', 'placeholder' => 'Nhập phụ phí']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>