<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;


$this->registerCss('
    /* Tổng thể */
    .grid-view {
        font-family: "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
        border-radius: 12px !important;
        overflow: hidden !important;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15) !important;
        border: none;
        margin-bottom: 30px !important;
    }
    .table {
        margin-bottom: 0;
    }
    .panel {
        border-radius: 12px !important;
        border: none !important;
        box-shadow: none;
    }
    .panel-heading {
        border-radius: 12px 12px 0 0 !important;
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        padding: 20px;
        color: white;
    }
    .panel-title {
        font-size: 18px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .panel-footer {
        background-color: #f8f9fa;
        border-radius: 0 0 12px 12px !important;
        padding: 15px 20px;
    }
    
    /* Header Table */
    .table > thead > tr > th {
        background: #f0f2f5;
        color: #0b2f70;
        font-weight: 600 !important;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 0.5px;
        padding: 15px 10px;
        border-bottom: 2px solid #e0e6ed;
        text-align: center;
    }
    
    /* Body Table */
    .table > tbody > tr > td {
        padding: 15px 10px;
        vertical-align: middle;
        border-color: #edf2f9;
    }
    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: #fbfbfd;
    }
    
    /* Forms & Inputs */
    .form-control {
        border-radius: 8px !important;
        border: 1px solid #d1d9e6;
        box-shadow: 0 3px 5px rgba(0,0,0,0.02);
        transition: all 0.2s;
        font-size: 13px;
    }
    .form-control:focus {
        border-color: #3f6ad8;
        box-shadow: 0 0 0 2px rgba(63,106,216,0.25);
    }
    /* Specific fix for status dropdown */
    select.form-control[name="HoaDonSearch[trang_thai]"] {
        min-width: 180px !important; /* Increased width for longer text */
        width: 100% !important; /* Ensure it fits the column */
        padding: 8px 12px;
        font-size: 13px;
        line-height: 1.5;
        white-space: nowrap; /* Prevent text wrapping */
        overflow: visible; /* Ensure text is not clipped */
    }
    select.form-control[name="HoaDonSearch[trang_thai]"] option {
        padding: 8px 12px;
        white-space: nowrap; /* Prevent option text wrapping */
    }
    /* Ensure the filter cell accommodates the dropdown */
    .grid-view th[data-col-seq="trang_thai"] {
        min-width: 180px !important; /* Match dropdown width */
        padding: 8px !important;
    }
    
    /* Buttons */
    .action-btn {
        border-radius: 8px !important;
        padding: 8px 14px !important;
        margin: 2px !important;
        border: none;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.3px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        text-transform: uppercase;
    }
    .btn-view {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white !important;
    }
    .btn-print {
        background: linear-gradient(135deg, #9b59b6, #8e44ad);
        color: white !important;
    }
    .btn-delete {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white !important;
    }
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        text-decoration: none;
    }
    .action-btn i {
        margin-right: 6px;
    }
    
    /* Badges & Status */
    .badge, .label {
        border-radius: 10px !important;
        font-weight: 500 !important;
        font-size: 12px !important;
        letter-spacing: 0.3px !important;
        display: inline-flex !important;
        align-items: center;
        padding: 8px 14px !important;
        margin: 4px !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .room-badge {
        background: linear-gradient(135deg, #36d1dc, #5b86e5);
        color: white;
    }
    .building-badge {
        background: linear-gradient(135deg, #6d6d6d, #3d3d3d);
        color: white;
    }
    .date-badge {
        background: linear-gradient(135deg, #11998e, #38ef7d);
        color: white;
    }
    .phone-badge {
        background: #f0f2f5;
        color: #3f6ad8;
        border-left: 3px solid #3f6ad8;
        padding: 8px 14px 8px 12px !important;
    }
    .status-paid {
        background: linear-gradient(135deg, #43a047, #2e7d32);
        color: white;
    }
    .status-unpaid {
        background: linear-gradient(135deg, #ff9800, #f57c00);
        color: white;
    }
    
    /* Hover Row Effect */
    .table-hover > tbody > tr:hover {
        background-color: rgba(63,106,216,0.05);
    }
');

/* @var $searchModel \backend\models\search\HoaDonSearch */
return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '50px',
        'headerOptions' => [
            'class' => 'text-center',
        ],
        'contentOptions' => ['class' => 'text-center'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Mã hóa đơn',
        'attribute' => 'ma_hoa_don',
        'headerOptions' => ['width' => '10%'],
        'contentOptions' => [
            'style' => 'font-weight: 600; color: #1a3b5d;',
        ],
        'filter' => Html::activeTextInput(
            $searchModel, 'ma_hoa_don',
            [
                'placeholder' => 'Tìm mã hóa đơn...',
                'class' => 'form-control'
            ]
        ),
        'format' => 'raw',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Phòng',
        'attribute' => 'ten_phong',
        'headerOptions' => ['width' => '14%'],
        'value' => function ($data) {
            return '<div style="display: flex; flex-wrap: wrap; gap: 6px;">
                    <span class="badge room-badge">
                        <i class="fa fa-door-open" style="margin-right: 6px;"></i>' . Html::encode($data->ten_phong) . '
                    </span>
                    <span class="badge building-badge">
                        <i class="fa fa-building" style="margin-right: 6px;"></i>' . Html::encode($data->ten_toa_nha) . '
                    </span>
                </div>';
        },
        'format' => 'raw',
        'filter' => Html::activeTextInput(
                $searchModel, 'ten_phong', [
                    'class' => 'form-control',
                    'placeholder' => 'Tên phòng...'
                ]
            ) . '<div style="margin-top: 8px;"></div>' . Html::activeTextInput(
                $searchModel, 'ten_toa_nha', [
                    'class' => 'form-control',
                    'placeholder' => 'Tên tòa nhà...'
                ]
            )
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'user_id',
        'label' => 'Khách hàng',
        'headerOptions' => ['width' => '20%'],
        'value' => function ($data) {
            $phone = preg_replace('/\D/', '', $data->dien_thoai);
            if (strlen($phone) == 10) {
                $phone = substr($phone, 0, 4) . '.' . substr($phone, 4, 3) . '.' . substr($phone, 7);
            }
            return '<div style="font-weight: 600; font-size: 14px; color: #3f6ad8; margin-bottom: 8px;">' .
                Html::encode($data->hoten) .
                '</div>' .
                '<span class="badge phone-badge"><i class="fa fa-phone" style="margin-right: 6px;"></i>' .
                Html::encode($phone) .
                '</span>';
        },
        'format' => 'raw',
        'filter' => Html::activeTextInput(
                $searchModel, 'hoten', [
                    'class' => 'form-control',
                    'placeholder' => 'Tìm theo tên...'
                ]
            ) . '<div style="margin-top: 8px;"></div>' . Html::activeTextInput(
                $searchModel, 'dien_thoai', [
                    'class' => 'form-control',
                    'placeholder' => 'Tìm theo SĐT...'
                ]
            )
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Người thực hiện',
        'attribute' => 'nguoi_thuc_hien',
        'headerOptions' => ['width' => '14%'],
        'contentOptions' => ['style' => 'padding: 8px 12px;'],
        'format' => 'raw',
        'value' => function ($data) {
            return '<div style="font-style: italic; color: #5a5a5a; font-size: 13px;">
                    <i class="fa fa-user-check" style="margin-right: 6px; color: #17a2b8;"></i>' .
                Html::encode($data->nguoi_thuc_hien) .
                '</div>';
        },
        'filter' => Html::activeTextInput(
            $searchModel, 'nguoi_thuc_hien', [
                'class' => 'form-control',
                'placeholder' => 'Người thực hiện...'
            ]
        ),
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'thang',
        'label' => 'Tháng',
        'headerOptions' => ['width' => '6%'],
        'value' => function ($data) {
            return Html::encode(sprintf('%02d', $data->thang));
        },
        'format' => 'raw',
        'filter' => Html::activeTextInput(
            $searchModel, 'thang',
            ['class' => 'form-control', 'placeholder' => 'MM (01-12)...']
        ),
        'contentOptions' => ['class' => 'text-center'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nam',
        'label' => 'Năm',
        'headerOptions' => ['width' => '6%'],
        'value' => function ($data) {
            return Html::encode($data->nam);
        },
        'format' => 'raw',
        'filter' => Html::activeTextInput(
            $searchModel, 'nam',
            ['class' => 'form-control', 'placeholder' => 'YYYY...']
        ),
        'contentOptions' => ['class' => 'text-center'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'trang_thai',
        'label' => 'Trạng thái',
        'headerOptions' => ['width' => '12%'], /* Slightly increased column width */
        'value' => function ($data) {
            $class = ($data->trang_thai == \backend\models\HoaDon::DA_THANH_TOAN) ? 'status-paid' : 'status-unpaid';
            $icon = ($data->trang_thai == \backend\models\HoaDon::DA_THANH_TOAN) ? 'check-circle' : 'clock-o';

            return '<div class="text-center">
                   <span class="badge ' . $class . '">
                   <i class="fa fa-' . $icon . '" style="margin-right: 6px;"></i> ' .
                Html::encode($data->trang_thai) .
                '</span></div>';
        },
        'format' => 'raw',
        'filter' => Html::activeDropDownList(
            $searchModel,
            'trang_thai',
            [
                \backend\models\HoaDon::CHUA_THANH_TOAN => \backend\models\HoaDon::CHUA_THANH_TOAN,
                \backend\models\HoaDon::DA_THANH_TOAN => \backend\models\HoaDon::DA_THANH_TOAN
            ],
            [
                'class' => 'form-control',
                'prompt' => 'Tất cả trạng thái'
            ]
        ),
        'contentOptions' => ['class' => 'text-center']
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{view} {print} {delete}',
        'header' => 'Thao tác',
        'headerOptions' => [
            'class' => 'text-center',
            'width' => '10%'
        ],
        'contentOptions' => ['class' => 'text-center'],
        'buttons' => [
            'view' => function ($url, $model) {
                return Html::a(
                    '<i class="fa fa-eye"></i> Xem',
                    Url::toRoute(['hoa-don/view', 'id' => $model->id]),
                    [
                        'role' => 'modal-remote',
                        'data-toggle' => 'tooltip',
                        'title' => 'Xem chi tiết',
                        'id' => 'select2',
                        'class' => 'action-btn btn-view'
                    ]
                );
            },
            'print' => function ($url, $model) {
                return Html::a(
                    '<i class="fa fa-print"></i> In',
                    '#',
                    [
                        'class' => 'btn-print action-btn',
                        'data-value' => $model->id,
                        'loai-in' => 'mot',
                        'title' => 'In hóa đơn'
                    ]
                );
            },
            'delete' => function ($url, $model) {
                if ($model->active == 1) {
                    return Html::a(
                        '<i class="fa fa-ban"></i> Hủy',
                        '#',
                        [
                            'class' => 'btn-delete action-btn',
                            'data-value' => $model->id,
                            'id' => 'btn-huy-hoa-don',
                            'title' => 'Hủy hóa đơn'
                        ]
                    );
                }
                return '';
            },
        ]
    ]
];
?>