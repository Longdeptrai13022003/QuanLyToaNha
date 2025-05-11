<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use backend\models\GiaoDich;

/* @var $searchModel \backend\models\search\QuanLyGiaoDichSearch */


$this->registerCss('
    /* Tổng thể */
    .grid-view {
        font-family: "Roboto", sans-serif !important;
        border-radius: 12px !important;
        overflow: hidden !important;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15) !important;
        border: none !important;
        margin-bottom: 30px !important;
    }
    .table {
        margin-bottom: 0 !important;
    }
    .panel {
        border-radius: 12px !important;
        border: none !important;
        box-shadow: none !important;
    }
    .panel-heading {
        border-radius: 12px 12px 0 0 !important;
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%) !important;
        padding: 20px !important;
        color: white !important;
    }
    .panel-title {
        font-size: 18px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 1px !important;
    }
    .panel-footer {
        background-color: #f8f9fa !important;
        border-radius: 0 0 12px 12px !important;
        padding: 15px 20px !important;
    }

    /* Header Table */
    .table > thead > tr > th {
        background: #f0f2f5 !important;
        color: #0b2f70 !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        font-size: 13px !important;
        letter-spacing: 0.5px !important;
        padding: 12px 8px !important;
        border-bottom: 2px solid #e0e6ed !important;
        text-align: center !important;
    }

    /* Body Table */
    .table > tbody > tr > td {
        padding: 12px 8px !important;
        vertical-align: middle !important;
        border-color: #edf2f9 !important;
    }
    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: #fbfbfd !important;
    }

    /* Forms & Inputs */
    .form-control {
        border-radius: 8px !important;
        border: 1px solid #d1d9e6 !important;
        box-shadow: 0 3px 5px rgba(0,0,0,0.02) !important;
        transition: all 0.2s !important;
        font-size: 12px !important;
        height: 34px !important;
    }
    .form-control:focus {
        border-color: #3f6ad8 !important;
        box-shadow: 0 0 0 2px rgba(63,106,216,0.25) !important;
    }
    .form-control::placeholder {
        color: #9ca3af !important;
        font-size: 12px !important;
    }
    .filter-container {
        display: flex !important;
        flex-direction: column !important;
        gap: 8px !important;
        padding: 8px !important;
    }

    /* Buttons */
    .action-btn {
        border-radius: 8px !important;
        padding: 6px 12px !important;
        margin: 2px !important;
        border: none !important;
        font-size: 12px !important;
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
    .btn-view {
        background: linear-gradient(135deg, #3498db, #2980b9) !important;
    }
    .btn-approve {
        background: linear-gradient(135deg, #43a047, #2e7d32) !important;
    }
    .btn-reject {
        background: linear-gradient(135deg, #e74c3c, #c0392b) !important;
    }
    .btn-send {
        background: linear-gradient(135deg, #00bcd4, #0097a7) !important;
    }
    .btn-cancel {
        background: linear-gradient(135deg, #ff9800, #f57c00) !important;
    }
    .action-btn:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important;
        text-decoration: none !important;
    }
    .action-btn i {
        margin-right: 4px !important;
    }

    /* Badges & Status */
    .badge {
        border-radius: 10px !important;
        font-weight: 500 !important;
        font-size: 11px !important;
        letter-spacing: 0.3px !important;
        display: inline-flex !important;
        align-items: center !important;
        padding: 6px 12px !important;
        margin: 3px !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
        color: white !important;
    }
    .room-badge {
        background: linear-gradient(135deg, #36d1dc, #5b86e5) !important;
    }
    .building-badge {
        background: linear-gradient(135deg, #6d6d6d, #3d3d3d) !important;
    }
    .phone-badge {
        background: #f0f2f5 !important;
        color: #3f6ad8 !important;
        border-left: 3px solid #3f6ad8 !important;
        padding: 6px 12px 6px 10px !important;
    }
    .status-success {
        background: linear-gradient(135deg, #43a047, #2e7d32) !important;
    }
    .status-failed {
        background: linear-gradient(135deg, #e74c3c, #c0392b) !important;
    }
    .status-pending {
        background: linear-gradient(135deg, #ff9800, #f57c00) !important;
    }
    .type-badge {
        background: linear-gradient(135deg, #9b59b6, #8e44ad) !important;
    }

    /* Hover Row Effect */
    .table-hover > tbody > tr:hover {
        background-color: rgba(63,106,216,0.05) !important;
    }

    /* Responsive */
    @media (max-width: 767px) {
        .grid-view {
            margin: 10px !important;
        }
        .table > thead > tr > th {
            font-size: 11px !important;
            padding: 8px 6px !important;
        }
        .table > tbody > tr > td {
            font-size: 11px !important;
            padding: 8px 6px !important;
        }
        .form-control {
            font-size: 11px !important;
            height: 30px !important;
        }
        .filter-container {
            gap: 6px !important;
            padding: 6px !important;
        }
        .action-btn {
            font-size: 11px !important;
            padding: 5px 10px !important;
        }
        .badge {
            font-size: 10px !important;
            padding: 5px 10px !important;
        }
    }
');

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '4%',
        'headerOptions' => ['class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ma_hop_dong',
        'label' => 'Hợp đồng',
        'headerOptions' => ['width' => '8%'],
        'contentOptions' => ['style' => 'font-weight: 600; text-align: center;'],
        'filter' => Html::activeTextInput(
            $searchModel, 'ma_hop_dong',
            ['class' => 'form-control', 'placeholder' => 'Mã hợp đồng...']
        ),
        'format' => 'raw',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ma_hoa_don',
        'label' => 'Hóa đơn',
        'headerOptions' => ['width' => '8%'],
        'contentOptions' => ['style' => 'font-weight: 600; text-align: center;'],
        'filter' => Html::activeTextInput(
            $searchModel, 'ma_hoa_don',
            ['class' => 'form-control', 'placeholder' => 'Mã hóa đơn...']
        ),
        'format' => 'raw',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ten_phong',
        'label' => 'Phòng',
        'headerOptions' => ['width' => '20%'],
        'value' => function ($data) {
            return '<div style="display: flex; flex-wrap: wrap; gap: 6px;">
                    <span class="badge room-badge">
                        <i class="fas fa-door-open" style="margin-right: 4px;"></i>' . Html::encode($data->ten_phong) . '
                    </span>
                    <span class="badge building-badge">
                        <i class="fas fa-building" style="margin-right: 4px;"></i>' . Html::encode($data->ten_toa_nha) . '
                    </span>
                </div>';
        },
        'format' => 'raw',
        'filter' => '<div class="filter-container">' .
            Html::activeTextInput(
                $searchModel, 'ten_phong',
                ['class' => 'form-control', 'placeholder' => 'Tên phòng...']
            ) .
            Html::activeTextInput(
                $searchModel, 'ten_toa_nha',
                ['class' => 'form-control', 'placeholder' => 'Tên tòa nhà...']
            ) . '</div>',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'hoten',
        'label' => 'Khách hàng',
        'headerOptions' => ['width' => '16%'],
        'value' => function ($data) {
            $phone = preg_replace('/\D/', '', $data->dien_thoai);
            if (strlen($phone) == 10) {
                $phone = substr($phone, 0, 4) . '.' . substr($phone, 4, 3) . '.' . substr($phone, 7);
            }
            return '<div style="font-weight: 600; font-size: 13px; color: #3f6ad8; margin-bottom: 6px;">' .
                Html::encode($data->hoten) . '</div>' .
                '<span class="badge phone-badge"><i class="fa fa-phone" style="margin-right: 4px;"></i>' .
                Html::encode($phone) . '</span>';
        },
        'format' => 'raw',
        'filter' => '<div class="filter-container">' .
            Html::activeTextInput(
                $searchModel, 'hoten',
                ['class' => 'form-control', 'placeholder' => 'Tên khách...']
            ) .
            Html::activeTextInput(
                $searchModel, 'dien_thoai',
                ['class' => 'form-control', 'placeholder' => 'Điện thoại...']
            ) . '</div>',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'created',
        'label' => 'Ngày thực hiện',
        'headerOptions' => ['width' => '10%'],
        'value' => function ($data) {
            $parts = explode(' ', $data->created);
            $date = implode('/', array_reverse(explode('-', $parts[0])));
            return '<div class="text-center"><span class="badge" style="background: linear-gradient(135deg, #11998e, #38ef7d);">
                    <i class="fa fa-calendar" style="margin-right: 4px;"></i>' . Html::encode($date) . '</span></div>';
        },
        'format' => 'raw',
        'filter' => '<div class="filter-container">' .
            Html::activeTextInput(
                $searchModel, 'created',
                ['class' => 'form-control', 'placeholder' => 'Thời gian từ (DD/MM/YYYY)...', 'id' => 'thoi-gian-tu']
            ) .
            Html::activeTextInput(
                $searchModel, 'ghi_chu',
                ['class' => 'form-control', 'placeholder' => 'Thời gian đến (DD/MM/YYYY)...', 'id' => 'thoi-gian-den']
            ) . '</div>',
        'contentOptions' => ['class' => 'text-center'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nguoi_thuc_hien',
        'label' => 'Người thực hiện',
        'headerOptions' => ['width' => '10%'],
        'value' => function ($data) {
            return '<div style="font-style: italic; color: #5a5a5a; font-size: 12px;">
                    <i class="fas fa-user-check" style="margin-right: 4px; color: #17a2b8;"></i>' .
                Html::encode($data->nguoi_thuc_hien) . '</div>';
        },
        'format' => 'raw',
        'filter' => Html::activeTextInput(
            $searchModel, 'nguoi_thuc_hien',
            ['class' => 'form-control', 'placeholder' => 'Người thực hiện...']
        ),
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'tong_tien',
        'label' => 'Số tiền',
        'headerOptions' => ['width' => '8%'],
        'value' => function ($data) {
            return '<div class="text-right" style="font-weight: 600; color: #d81b60;">' .
                number_format($data->tong_tien, 0, ',', '.') . ' VNĐ</div>';
        },
        'format' => 'raw',
        'filter' => false,
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'trang_thai_giao_dich',
        'label' => 'Trạng thái',
        'headerOptions' => ['width' => '10%'],
        'value' => function ($data) {
            if ($data->trang_thai_giao_dich == GiaoDich::THANH_CONG) {
                return '<div class="text-center"><span class="badge status-success">
                        <i class="fa fa-check-circle" style="margin-right: 4px;"></i>' . GiaoDich::THANH_CONG . '</span></div>';
            } elseif ($data->trang_thai_giao_dich == GiaoDich::KHONG_THANH_CONG) {
                return '<div class="text-center"><span class="badge status-failed">
                        <i class="fa fa-ban" style="margin-right: 4px;"></i>' . GiaoDich::KHONG_THANH_CONG . '</span></div>';
            } else {
                return '<div class="text-center"><span class="badge status-pending">
                        <i class="fa fa-refresh" style="margin-right: 4px;"></i>' . GiaoDich::KHOI_TAO . '</span></div>';
            }
        },
        'format' => 'raw',
        'filter' => Html::activeDropDownList(
            $searchModel,
            'trang_thai_giao_dich',
            [
                GiaoDich::KHOI_TAO => GiaoDich::KHOI_TAO,
                GiaoDich::THANH_CONG => GiaoDich::THANH_CONG,
                GiaoDich::KHONG_THANH_CONG => GiaoDich::KHONG_THANH_CONG,
            ],
            ['class' => 'form-control', 'prompt' => 'Tất cả trạng thái']
        ),
        'contentOptions' => ['class' => 'text-center'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ma_id_casso',
        'label' => 'Loại giao dịch',
        'headerOptions' => ['width' => '8%'],
        'value' => function ($data) {
            $type = $data->hoa_don_id == null ? 'Giao dịch hợp đồng' : 'Giao dịch hóa đơn';
            return '<div class="text-center"><span class="badge type-badge">
                    <i class="fa fa-file-text-o" style="margin-right: 4px;"></i>' . Html::encode($type) . '</span></div>';
        },
        'format' => 'raw',
        'filter' => Html::activeDropDownList(
            $searchModel,
            'ma_id_casso',
            [
                1 => 'Giao dịch hợp đồng',
                0 => 'Giao dịch hóa đơn'
            ],
            ['class' => 'form-control', 'prompt' => 'Tất cả']
        ),
        'contentOptions' => ['class' => 'text-center'],
    ],
    [
        'header' => 'Xem',
        'value' => function ($data) {
            return Html::a(
                '<i class="fa fa-eye"></i> Xem',
                Url::toRoute(['giao-dich/view', 'id' => $data->id]),
                [
                    'role' => 'modal-remote',
                    'data-toggle' => 'tooltip',
                    'title' => 'Xem chi tiết',
                    'class' => 'action-btn btn-view'
                ]
            );
        },
        'format' => 'raw',
        'headerOptions' => ['width' => '6%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center'],
    ],
    [
        'header' => 'Duyệt',
        'value' => function($data) {
            return $data->trang_thai_giao_dich != GiaoDich::KHOI_TAO ? '' : Html::a('<i class="fa fa-check-circle-o"></i> Duyệt','#',['class'=>'btn-duyet-trang-thai text-success pull-left','data-pjax' => 0,'data-value'=>$data->id,'loai'=>1]).'<br/>'.
                Html::a('<i class="fa fa-ban"></i> Hủy','#',['class'=>'btn-duyet-trang-thai text-danger pull-left','data-pjax' => 0,'data-value'=>$data->id,'loai'=>0]);
        },
        'format' => 'raw',
        'headerOptions' => ['width' => '6%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center'],
    ],
    [
        'header' => 'Gửi tin',
        'value' => function($data) {
            return $data->trang_thai_giao_dich != GiaoDich::KHOI_TAO ? '' : Html::a('<i class="fa fa-send"></i>','#',['class'=>'text-primary text-center btn-gui-tin','data-pjax' => 0,'data-value'=>$data->id]);
        },
        'format' => 'raw',
        'headerOptions' => ['width' => '6%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center'],
    ],
    [
        'header' => 'Hủy',
        'value' => function($data) {
            return $data->trang_thai_giao_dich != GiaoDich::KHOI_TAO ? '' : \yii\bootstrap\Html::a('<i class="fa fa-trash"></i>','#', ['class' => 'text-danger','id'=>'btn-huy-giao-dich','data-value'=>$data->id]);
        },
        'format' => 'raw',
        'headerOptions' => ['width' => '6%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center'],
    ],
];
?>


