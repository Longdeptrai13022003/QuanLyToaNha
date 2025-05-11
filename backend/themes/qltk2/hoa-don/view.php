<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HoaDon */
/* @var $khach \common\models\User */
/* @var $phong \backend\models\DanhMuc */
/* @var $toaNha \backend\models\DanhMuc */
/* @var $giaoDichs \backend\models\GiaoDich[] */
/* @var $dichVus [] */
/* @var $thucHiens [] */
/* @var $anhDien string */
?>

<!-- Tích hợp Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap') !important;

    body {
        font-family: 'Roboto', sans-serif !important;
        background: linear-gradient(135deg, #f4f4f4 0%, #e9ecef 100%) !important;
        margin: 0 !important;
        padding: 30px !important;
        color: #333 !important;
    }

    .hoa-don-wrapper {
        max-width: 1000px !important;
        margin: 0 auto !important;
    }

    .hoa-don-container {
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

    .image-gallery {
        display: grid !important;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)) !important;
        gap: 25px !important;
    }

    .image-card {
        background: #fff !important;
        border-radius: 15px !important;
        overflow: hidden !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05) !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease !important;
        position: relative !important;
    }

    .image-card:hover {
        transform: translateY(-10px) !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .image-card img {
        width: 100% !important;
        height: 220px !important;
        object-fit: cover !important;
        border-bottom: 2px solid #3498db !important;
    }

    .image-card .file-type {
        background: linear-gradient(90deg, #3498db, #2980b9) !important;
        color: #fff !important;
        padding: 8px !important;
        font-size: 14px !important;
        text-align: center !important;
    }

    .service-table, .transaction-table {
        width: 100% !important;
        border-collapse: collapse !important;
        background: #fff !important;
        border-radius: 10px !important;
        overflow: hidden !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05) !important;
    }

    .service-table th, .service-table td,
    .transaction-table th, .transaction-table td {
        padding: 15px !important;
        text-align: left !important;
        font-size: 15px !important;
    }

    .service-table th, .transaction-table th {
        background: #3498db !important;
        color: #fff !important;
        font-weight: 500 !important;
        text-transform: uppercase !important;
    }

    .service-table tbody tr:nth-child(even),
    .transaction-table tbody tr:nth-child(even) {
        background: #f8f9fa !important;
    }

    .service-table tbody tr:hover,
    .transaction-table tbody tr:hover {
        background: #e9f5ff !important;
    }

    .service-table .money,
    .transaction-table .money {
        color: #27ae60 !important;
        font-weight: 500 !important;
        text-align: right !important;
    }

    @media (max-width: 768px) {
        .hoa-don-container {
            padding: 20px !important;
        }

        .image-gallery {
            grid-template-columns: 1fr !important;
        }

        .card .info-row {
            flex-direction: column !important;
        }

        .card .info-item {
            margin-right: 0 !important;
            margin-bottom: 15px !important;
        }
    }
</style>

<div class="hoa-don-wrapper">
    <div class="hoa-don-container">
        <!-- Thông tin khách hàng -->
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

        <!-- Thông tin hóa đơn -->
        <div class="section">
            <h4 class="section-title"><i class="fas fa-file-invoice"></i> Thông tin hóa đơn</h4>
            <div class="card">
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Tòa nhà:</strong> <?= Html::encode($toaNha->name) ?></p>
                    </div>
                    <div class="info-item">
                        <p><strong>Phòng ở:</strong> <?= Html::encode($phong->name) ?></p>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Thời gian:</strong> Tháng <?= Html::encode($model->thang) ?>/<?= Html::encode($model->nam) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chi phí dịch vụ -->
        <div class="section">
            <h4 class="section-title"><i class="fas fa-money-bill-wave"></i> Chi phí dịch vụ</h4>
            <table class="service-table">
                <thead>
                <tr>
                    <th>Dịch vụ</th>
                    <th>Số tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dichVus as $key => $dichVu): ?>
                    <tr>
                        <td><strong><?= Html::encode($key) ?></strong></td>
                        <td class="money"><?= number_format($dichVu, 0, ',', '.') ?> VNĐ</td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><strong>Tiền phòng</strong></td>
                    <td class="money"><?= number_format($model->tien_phong, 0, ',', '.') ?> VNĐ</td>
                </tr>
                <tr>
                    <td><strong>Tổng tiền</strong></td>
                    <td class="money"><?= number_format($model->tong_tien, 0, ',', '.') ?> VNĐ</td>
                </tr>
                <tr>
                    <td><strong>Đã thanh toán</strong></td>
                    <td class="money"><?= number_format($model->da_thanh_toan, 0, ',', '.') ?> VNĐ</td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Số điện tháng (only shown if $anhDien is not empty) -->
        <div class="section">
            <h4 class="section-title"><i class="fas fa-bolt"></i> Số điện tháng</h4>
            <?php if (!empty($anhDien)): ?>
                <div class="image-gallery">
                    <div class="image-card">
                        <?= Html::a(
                            '<img src="' . $anhDien . '" alt="Electric Meter">',
                            $anhDien,
                            [
                                'class' => 'example-image-link',
                                'data-lightbox' => 'roadtrip',
                                'target' => '_blank'
                            ]
                        ) ?>
                        <div class="file-type">Ảnh đồng hồ điện</div>
                    </div>
                </div>
            <?php else: ?>
                <div class="card">
                    <p style="color: #555; font-size: 16px;">Không có ảnh đồng hồ điện.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Thông tin giao dịch -->
        <div class="section">
            <h4 class="section-title"><i class="fas fa-history"></i> Thông tin giao dịch</h4>
            <table class="transaction-table">
                <thead>
                <tr>
                    <th>Người thực hiện</th>
                    <th>Thời gian giao dịch</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($giaoDichs as $index => $giaoDich): ?>
                    <?php
                    $parts = explode(' ', $giaoDich->created);
                    $ngay = implode('/', array_reverse(explode('-', $parts[0])));
                    ?>
                    <tr>
                        <td><?= Html::encode($thucHiens[$index]) ?></td>
                        <td><?= $ngay ?> <?= $parts[1] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>