<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $toanhaids ArrayHelper */
/* @var $hoaDons backend\models\QuanLyHoaDon[] */
/* @var $thangs [] */
/* @var $nams [] */
/* @var $toaNhaID int */
/* @var $hoanThanh int */
/* @var $congNo int */
/* @var $conNo string */
/* @var $daThanhToan string */

$this->title = 'Thống kê công nợ';
$this->params['breadcrumbs'][] = $this->title;

$thangTruoc = date('n');

// Register additional CSS
$this->registerCss("
    .hoa-don-cong-no {
        font-family: 'Roboto', sans-serif !important;
        background: #f8fafc !important;
        padding: 20px !important;
    }

    .page-title {
        border-radius: 8px !important;
        margin-bottom: 24px !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08) !important;
        font-size: 24px !important;
    }

    .filter-container {
        background: #ffffff !important;
        border-radius: 8px !important;
        padding: 20px !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08) !important;
        margin-bottom: 24px !important;
    }

    .filter-container .row {
        display: flex !important;
        flex-wrap: wrap !important;
        align-items: flex-end !important;
        margin: 0 -10px !important;
    }

    .filter-container .form-group {
        margin-bottom: 16px !important;
        padding: 0 10px !important;
    }

    .form-label {
        display: block !important;
        font-size: 14px !important;
        font-weight: 500 !important;
        color: #1f2937 !important;
        margin-bottom: 8px !important;
        line-height: 20px !important;
    }

    .drop-select, .btn-month-nav, #loai-hoa-don {
        height: 40px !important;
        border-radius: 8px !important;
        font-size: 14px !important;
        transition: all 0.2s ease !important;
    }

    .drop-select {
        border: 1px solid #d1d5db !important;
        padding: 0 12px !important;
        width: 100% !important;
        background: #ffffff !important;
    }

    .drop-select:focus {
        border-color: #3f51b5 !important;
        box-shadow: 0 0 6px rgba(63, 81, 181, 0.3) !important;
        
    }

    .btn-month-nav {
        width: 40px !important;
        background: #ffffff !important;
        border: 1px solid #d1d5db !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
    }

    .btn-month-nav:hover {
        background: #f1f5f9 !important;
        border-color: #3f51b5 !important;
    }

    #loai-hoa-don {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        background: #3f51b5 !important;
        border: none !important;
        color: #ffffff !important;
        font-weight: 500 !important;
        padding: 0 16px !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
    }

    #loai-hoa-don:hover {
        background: #303f9f !important;
    }

    .dashboard-stat {
        border-radius: 8px !important;
        color: #ffffff !important;
        padding: 20px !important;
        box-shadow: 0 6px 12px rgba(0,0,0,0.1) !important;
        margin-bottom: 24px !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease !important;
    }

    .dashboard-stat:hover {
        transform: translateY(-4px) !important;
        box-shadow: 0 8px 16px rgba(0,0,0,0.15) !important;
    }

    .dashboard-stat .visual {
        float: left !important;
        width: 64px !important;
        height: 64px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .dashboard-stat .visual i {
        font-size: 60px !important;
        color: rgba(255, 255, 255, 0.9) !important;
    }

    .dashboard-stat .details {
        padding-left: 80px !important;
    }

    .dashboard-stat .details .number {
        font-size: 20px !important;
        font-weight: 600 !important;
        text-align: right !important;
        line-height: 28px !important;
        margin-bottom: 8px !important;
    }

    .dashboard-stat .details .desc {
        font-size: 14px !important;
        font-weight: 400 !important;
        text-align: right !important;
        opacity: 0.8 !important;
    }

    .purple-plum {
        background: linear-gradient(135deg, #9c27b0, #673ab7) !important;
    }

    .green-haze {
        background: linear-gradient(135deg, #4caf50, #009688) !important;
    }

    .red-intense {
        background: linear-gradient(135deg, #f44336, #e91e63) !important;
    }

    .blue-madison {
        background: linear-gradient(135deg, #2196f3, #3f51b5) !important;
    }

    .small-font {
        font-weight: 700 !important;
        font-size: 18px !important;
    }

    .table-container {
        background: #ffffff !important;
        border-radius: 8px !important;
        padding: 20px !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08) !important;
        overflow: hidden !important;
    }

    .custom-table {
        width: 100% !important;
        border-collapse: separate !important;
        border-spacing: 0 !important;
        table-layout: fixed !important;
    }

    .custom-table thead th {
        background: linear-gradient(135deg, #3f51b5, #303f9f) !important;
        color: #ffffff !important;
        padding: 14px 18px !important;
        font-size: 13px !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        border: none !important;
        white-space: nowrap !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
    }

    .custom-table tbody tr {
        transition: background 0.2s ease, transform 0.2s ease !important;
    }

    .custom-table tbody tr:nth-child(even) {
        background: #f8fafc !important;
    }

    .custom-table tbody tr:hover {
        background: #e8eef6 !important;
        transform: translateY(-1px) !important;
    }

    .custom-table tbody td {
        padding: 14px 18px !important;
        font-size: 15px !important;
        color: #1f2937 !important;
        border-bottom: 1px solid #e5e7eb !important;
        border-right: 1px solid #e5e7eb !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        background: #ffffff !important;
        box-shadow: inset 0 0 2px rgba(0,0,0,0.05) !important;
    }

    .custom-table tbody td:last-child {
        border-right: none !important;
    }

    /* Phân bố chiều rộng cột */
    .custom-table th:nth-child(1), .custom-table td:nth-child(1) { /* STT */
        width: 70px !important;
    }

    .custom-table th:nth-child(2), .custom-table td:nth-child(2) { /* Hợp đồng */
        width: 140px !important;
    }

    .custom-table th:nth-child(3), .custom-table td:nth-child(3) { /* Phòng */
        width: 120px !important;
    }

    .custom-table th:nth-child(4), .custom-table td:nth-child(4) { /* Khách */
        width: 140px !important;
    }

    .custom-table th:nth-child(5), .custom-table td:nth-child(5) { /* Tổng tiền */
        width: 160px !important;
        text-align: right !important;
    }

    .custom-table th:nth-child(6), .custom-table td:nth-child(6) { /* Trạng thái */
        width: 160px !important;
    }

    .custom-table th:nth-child(7), .custom-table td:nth-child(7) { /* Còn nợ */
        width: 160px !important;
        text-align: right !important;
    }

    .status-unpaid {
        color: #f44336 !important;
        font-weight: 600 !important;
    }

    .status-partial {
        color: #ff9800 !important;
        font-weight: 600 !important;
    }

    .status-paid {
        color: #4caf50 !important;
        font-weight: 600 !important;
    }

    .money-amount {
        font-family: 'Roboto Mono', monospace !important;
        font-weight: 600 !important;
        text-align: right !important;
    }

    .customer-name {
        font-weight: 600 !important;
        font-size: 15px !important;
    }

    .customer-phone {
        color: #6b7280 !important;
        font-size: 13px !important;
    }

    .btn-primary {
        background: #3f51b5 !important;
        border: none !important;
        border-radius: 8px !important;
        padding: 10px 16px !important;
        font-weight: 500 !important;
        transition: background 0.2s ease !important;
    }

    .btn-primary:hover {
        background: #303f9f !important;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .filter-container .row > div {
            margin-bottom: 12px !important;
        }

        .dashboard-stat {
            padding: 16px !important;
        }

        .dashboard-stat .visual {
            width: 48px !important;
            height: 48px !important;
        }

        .dashboard-stat .visual i {
            font-size: 32px !important;
        }

        .dashboard-stat .details {
            padding-left: 60px !important;
        }

        .dashboard-stat .details .number {
            font-size: 18px !important;
            line-height: 24px !important;
        }

        .dashboard-stat .details .desc {
            font-size: 12px !important;
        }
    }

    @media (max-width: 767px) {
        .hoa-don-cong-no {
            padding: 12px !important;
        }

        .page-title {
            font-size: 20px !important;
            padding: 12px 16px !important;
            margin-bottom: 16px !important;
        }

        .filter-container {
            padding: 16px !important;
            margin-bottom: 16px !important;
        }

        .filter-container .form-group {
            margin-bottom: 12px !important;
        }

        .drop-select, .btn-month-nav, #loai-hoa-don {
            height: 36px !important;
            font-size: 13px !important;
        }

        .form-label {
            font-size: 13px !important;
            margin-bottom: 6px !important;
        }

        .table-container {
            padding: 16px !important;
        }

        .custom-table {
            table-layout: auto !important;
        }

        .custom-table thead th,
        .custom-table tbody td {
            font-size: 13px !important;
            padding: 10px 12px !important;
        }

        .custom-table th:nth-child(n),
        .custom-table td:nth-child(n) {
            width: auto !important;
            min-width: 80px !important;
        }

        .customer-name {
            font-size: 13px !important;
        }

        .customer-phone {
            font-size: 11px !important;
        }
    }
");

// Register Font Awesome and Google Fonts
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
$this->registerCssFile('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Roboto+Mono:wght@400;600&display=swap');
?>

    <div class="hoa-don-cong-no">
        <!-- Filters Section -->
        <div class="filter-container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-2">
                    <div class="form-group">
                        <?= Html::label('Tòa nhà', 'toa-nha-id', ['class' => 'form-label']) ?>
                        <?= Html::dropDownList('toa_nha_id', $toaNhaID, $toanhaids, ['class' => 'form-control drop-select', 'id' => 'toa-nha-id']) ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <?= Html::label('Phòng', 'phong-id', ['class' => 'form-label']) ?>
                        <?= Html::dropDownList('phong_id', null, [], ['prompt' => '-- Chọn --', 'class' => 'form-control drop-select', 'id' => 'phong-id']) ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-4 col-5">
                            <div class="form-group">
                                <?= Html::label('Tháng', 'thang', ['class' => 'form-label']) ?>
                                <?= Html::dropDownList('thang', $thangTruoc, $thangs, ['class' => 'form-control drop-select select-time', 'id' => 'thang_tk']) ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-5">
                            <div class="form-group">
                                <?= Html::label('Năm', 'nam', ['class' => 'form-label']) ?>
                                <?= Html::dropDownList('nam', date('Y'), $nams, ['class' => 'form-control drop-select select-time', 'id' => 'nam_tk']) ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-1">
                            <div class="form-group">
                                <div class="form-label"> </div>
                                <?= Html::a('<i class="fas fa-chevron-left"></i>', '#', ['class' => 'btn btn-light btn-month-nav change-month', 'loai' => 0]) ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-1">
                            <div class="form-group">
                                <div class="form-label"> </div>
                                <?= Html::a('<i class="fas fa-chevron-right"></i>', '#', ['class' => 'btn btn-light btn-month-nav change-month', 'loai' => 1]) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <div class="form-label"> </div>
                        <?= Html::a('<i class="fas fa-check-circle mr-1"> </i> Hoàn thành', '#', ['class' => 'btn btn-primary', 'id' => 'loai-hoa-don', 'loai' => 'hoan thanh']) ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards Section -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple-plum">
                    <div class="visual">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="details">
                        <div class="number">Hoàn thành: <span class="small-font hoan-thanh"><?= $hoanThanh ?></span></div>
                        <div class="desc">Hóa đơn</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="dashboard-stat green-haze">
                    <div class="visual">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="details">
                        <div class="number">Đã thanh toán: <span class="small-font da-thanh-toan"><?= $daThanhToan ?></span></div>
                        <div class="desc">Số tiền</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div class="visual">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="details">
                        <div class="number">Công nợ: <span class="small-font cong-no"><?= $congNo ?></span></div>
                        <div class="desc">Hóa đơn</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue-madison">
                    <div class="visual">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="details">
                        <div class="number">Còn nợ: <span class="small-font con-no"><?= $conNo ?></span></div>
                        <div class="desc">Số tiền</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div id="list-hoa-don" class="table-container">
            <div class="table-responsive">
                <table class="table custom-table table-striped text-nowrap">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hợp đồng</th>
                        <th>Phòng</th>
                        <th>Khách</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Còn nợ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($hoaDons)): ?>
                        <tr>
                            <td colspan="7" style="text-align: center;">Không có hóa đơn nào.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($hoaDons as $index => $hoaDon): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= Html::encode($hoaDon->ma_hop_dong ?? '') ?></td>
                                <td><?= Html::encode($hoaDon->ten_phong ?? '') ?></td>
                                <td>
                                    <div class="customer-name"><?= Html::encode($hoaDon->hoten ?? '') ?></div>
                                    <div class="customer-phone"><?= Html::encode($hoaDon->dien_thoai ?? '') ?></div>
                                </td>
                                <td class="money-amount"><?= number_format($hoaDon->tong_tien ?? 0, 0, ',', '.') ?> đ</td>
                                <td>
                                    <?php
                                    $daThanhToan = $hoaDon->da_thanh_toan ?? 0;
                                    $tongTien = $hoaDon->tong_tien ?? 0;
                                    if ($daThanhToan == 0): ?>
                                        <span class="status-unpaid">Chưa thanh toán</span>
                                    <?php elseif ($daThanhToan < $tongTien): ?>
                                        <span class="status-partial">TT một phần</span>
                                    <?php else: ?>
                                        <span class="status-paid">Đã thanh toán</span>
                                    <?php endif; ?>
                                </td>
                                <td class="money-amount"><?= number_format(($tongTien - $daThanhToan), 0, ',', '.') ?> đ</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/backend/assets/js-view/thong-ke.js', ['depends' => ['backend\assets\Qltk2Asset'], 'position' => \yii\web\View::POS_END]); ?>