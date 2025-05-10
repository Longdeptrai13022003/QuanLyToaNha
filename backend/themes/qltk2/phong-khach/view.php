<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PhongKhach */
/* @var $khach \common\models\User */
/* @var $phong \backend\models\DanhMuc */
/* @var $toanha \backend\models\DanhMuc */
/* @var $user \common\models\User */
/* @var $giaoDichs \backend\models\GiaoDich[] */
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

    .contract-wrapper {
        max-width: 1000px !important;
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
    }

    .card .info-item {
        flex: 1 !important;
        margin-right: 20px !important;
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

    .highlight {
        color: #e74c3c !important;
        background: #fce8e6 !important;
        padding: 2px 8px !important;
        border-radius: 4px !important;
        font-weight: 500 !important;
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

    .image-card .image-label {
        position: absolute !important;
        bottom: 10px !important;
        left: 10px !important;
        background: rgba(0, 0, 0, 0.7) !important;
        color: #fff !important;
        padding: 5px 10px !important;
        border-radius: 4px !important;
        font-size: 14px !important;
    }

    .transaction-table {
        width: 100% !important;
        border-collapse: collapse !important;
        background: #fff !important;
        border-radius: 10px !important;
        overflow: hidden !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05) !important;
    }

    .transaction-table th, .transaction-table td {
        padding: 15px !important;
        text-align: left !important;
        font-size: 15px !important;
    }

    .transaction-table th {
        background: #3498db !important;
        color: #fff !important;
        font-weight: 500 !important;
        text-transform: uppercase !important;
    }

    .transaction-table tbody tr:nth-child(even) {
        background: #f8f9fa !important;
    }

    .transaction-table tbody tr:hover {
        background: #e9f5ff !important;
    }

    .transaction-table .money {
        color: #27ae60 !important;
        font-weight: 500 !important;
    }

    @media (max-width: 768px) {
        .image-gallery {
            grid-template-columns: 1fr !important;
        }

        .contract-container {
            padding: 20px !important;
        }
    }
    .date-display {
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
        flex-wrap: wrap !important;
        background: #f1f8ff !important;
        padding: 8px !important;
        border-radius: 6px !important;
        font-size: 15px !important;
    }

    .date-display span {
        color: #2c3e50 !important;
        font-weight: 500 !important;
    }

    .date-display .separator {
        color: #2c3e50 !important;
        font-weight: 600 !important;
    }

    @media (max-width: 768px) {
        .date-display {
            flex-direction: column !important;
            align-items: flex-start !important;
        }
    }
</style>

<div class="contract-wrapper">
    <div class="contract-container">
        <div class="section">
            <h4 class="section-title"><i class="fas fa-file-contract"></i> Thông tin hợp đồng</h4>
            <div class="card">
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Mã hợp đồng:</strong> <span class="highlight"><?= Html::encode($model->ma_hop_dong) ?></span></p>
                    </div>
                    <div class="info-item">
                        <p><strong>Người thực hiện:</strong> <?= is_null($user) ? 'Tài khoản không còn' : Html::encode($user->hoten) ?></p>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-item">
                        <?php
                        $phan = explode(' ', $model->created);
                        $ngay = explode('-', $phan[0]);
                        $hienThiNgay = implode('/', array_reverse($ngay));
                        ?>
                        <p><strong>Thời gian thực hiện:</strong> <?= $hienThiNgay . ' ' . $phan[1] ?></p>
                    </div>
                    <div class="info-item">
                        <?php
                        $hienThiTu = $model->thoi_gian_hop_dong_tu ? DateTime::createFromFormat('Y-m-d H:i:s', $model->thoi_gian_hop_dong_tu)->format('d/m/Y H:i:s') : 'N/A';
                        $hienThiDen = $model->thoi_gian_hop_dong_den ? DateTime::createFromFormat('Y-m-d H:i:s', $model->thoi_gian_hop_dong_den)->format('d/m/Y H:i:s') : 'N/A';
                        ?>
                        <p><strong>Thời gian hợp đồng:</strong></p>
                        <div class="date-display">
                            <span><?= $hienThiTu ?></span>
                            <span class="separator">-</span>
                            <span><?= $hienThiDen ?></span>
                        </div>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Tòa nhà:</strong> <?= Html::encode($toanha->name) ?></p>
                    </div>
                    <div class="info-item">
                        <p><strong>Phòng:</strong> <?= Html::encode($phong->name) ?></p>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Đơn giá:</strong> <span class="money"><?= number_format($phong->don_gia, 0, ',', '.') ?> VNĐ</span></p>
                    </div>
                    <div class="info-item">
                        <p><strong>Số tháng:</strong> <span class="money"><?= sprintf('%02d', $model->so_thang_hop_dong) ?></span></p>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Tổng tiền:</strong> <span class="money"><?= number_format($model->don_gia * $model->so_thang_hop_dong, 0, ',', '.') ?> VNĐ</span></p>
                    </div>
                    <div class="info-item">
                        <p><strong>Chiết khấu:</strong> <span class="money"><?= number_format($model->so_tien_chiet_khau, 0, ',', '.') ?>
                                <?= $model->kieu_chiet_khau == '%' ? '(' . $model->chiet_khau . '%)' : 'VNĐ' ?></span></p>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-item">
                        <p><strong>Thành tiền:</strong> <span class="money"><?= number_format($model->thanh_tien, 0, ',', '.') ?> VNĐ</span></p>
                    </div>
                    <div class="info-item">
                        <p><strong>Cọc trước:</strong> <span class="money"><?= number_format($model->coc_truoc, 0, ',', '.') ?> VNĐ</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h4 class="section-title"><i class="fas fa-folder"></i> File(s) hợp đồng</h4>
            <div class="image-gallery">
                <?php if (empty($model->anh_hop_dong)): ?>
                    <div class="image-card">
                        <img src="hinh-anh/no-image.jpg" alt="No Image">
                        <div class="file-type">No Image</div>
                    </div>
                <?php else: ?>
                    <?php $anhHopDong = json_decode($model->anh_hop_dong, true); ?>
                    <?php if (is_array($anhHopDong)): ?>
                        <?php foreach ($anhHopDong as $anh): ?>
                            <?php $anh = trim($anh, '"'); ?>
                            <?php $fileExtension = pathinfo($anh, PATHINFO_EXTENSION); ?>
                            <?php
                            $thumbnail = 'hinh-anh/no-image.jpg';
                            $fileTypeLabel = 'Unknown';
                            if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])):
                                $thumbnail = 'hinh-anh/' . $anh;
                                $fileTypeLabel = 'Image';
                            elseif ($fileExtension === 'pdf'):
                                $thumbnail = 'hinh-anh/pdf.png';
                                $fileTypeLabel = 'PDF';
                            elseif (in_array($fileExtension, ['doc', 'docx'])):
                                $thumbnail = 'hinh-anh/word.png';
                                $fileTypeLabel = 'Word';
                            endif;
                            ?>
                            <div class="image-card">
                                <?= Html::a(
                                    '<img src="' . $thumbnail . '" alt="' . $fileTypeLabel . '">',
                                    'hinh-anh/' . $anh,
                                    ['target' => '_blank']
                                ) ?>
                                <div class="file-type"><?= $fileTypeLabel ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="section">
            <h4 class="section-title"><i class="fas fa-user"></i> Thông tin khách hàng</h4>
            <div class="card">
                <p><strong>Họ tên:</strong> <?= Html::encode($khach->hoten) ?></p>
                <p><strong>Điện thoại:</strong> <?= Html::encode($khach->dien_thoai) ?></p>
                <p><strong>Email:</strong> <?= Html::encode($khach->email) ?></p>
            </div>
        </div>

        <div class="section">
            <h4 class="section-title"><i class="fas fa-id-card"></i> Ảnh 2 mặt CCCD</h4>
            <div class="image-gallery">
                <?php if (empty($khach->anhcancuoc)): ?>
                    <div class="image-card">
                        <img src="hinh-anh/no-image.jpg" alt="No Image">
                        <div class="file-type">No Image</div>
                    </div>
                <?php else: ?>
                    <?php $anhs = explode(',', $khach->anhcancuoc); ?>
                    <?php $labels = ['Mặt trước', 'Mặt sau']; ?>
                    <?php foreach ($anhs as $index => $anh): ?>
                        <div class="image-card">
                            <?= Html::a(
                                '<img src="hinh-anh/' . $anh . '" alt="ID Card">',
                                'hinh-anh/' . $anh,
                                ['target' => '_blank']
                            ) ?>
                            <div class="file-type"><?= $labels[$index] ?? 'Ảnh CCCD' ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="section">
            <h4 class="section-title"><i class="fas fa-history"></i> Lịch sử thanh toán</h4>
            <table class="transaction-table">
                <thead>
                <tr>
                    <th>Thời gian</th>
                    <th>Số tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($giaoDichs as $giaoDich): ?>
                    <?php
                    $phan = explode(' ', $giaoDich->created);
                    $ngay = explode('-', $phan[0]);
                    $hienThiNgay = implode('/', array_reverse($ngay));
                    ?>
                    <tr>
                        <td><?= $hienThiNgay ?></td>
                        <td class="money"><?= number_format($giaoDich->so_tien_giao_dich, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>