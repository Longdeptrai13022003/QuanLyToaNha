<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap') !important;
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
    .contract-grid {
        background: #fff !important;
        border-radius: 10px !important;
        overflow: hidden !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05) !important;
        font-family: 'Roboto', sans-serif !important;
    }

    .contract-grid .kv-grid-table {
        width: 100% !important;
        border-collapse: collapse !important;
    }

    .contract-grid th {
        background: #3498db !important;
        color: #fff !important;
        font-weight: 500 !important;
        text-transform: uppercase !important;
        padding: 12px !important;
        text-align: center !important;
        font-size: 14px !important;
    }

    .contract-grid td {
        padding: 12px !important;
        font-size: 14px !important;
        color: #555 !important;
        border-bottom: 1px solid #e9ecef !important;
    }

    .contract-grid tbody tr:nth-child(even) {
        background: #f8f9fa !important;
    }

    .contract-grid tbody tr:hover {
        background: #e9f5ff !important;
    }

    .contract-grid .form-control {
        border-radius: 6px !important;
        box-shadow: none !important;
        border: 1px solid #ced4da !important;
        padding: 8px !important;
        font-size: 14px !important;
        transition: border-color 0.3s ease !important;
    }

    .contract-grid .form-control:focus {
        border-color: #3498db !important;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.3) !important;
        outline: none !important;
    }

    .contract-grid .text-primary {
        color: #3498db !important;
    }

    .contract-grid .text-success {
        color: #27ae60 !important;
    }

    .contract-grid .text-danger {
        color: #e74c3c !important;
    }

    .contract-grid .money {
        color: #27ae60 !important;
        font-weight: 500 !important;
        background: #e8f5e9 !important;
        padding: 2px 8px !important;
        border-radius: 4px !important;
    }

    .contract-grid .filter-row .row {
        margin: 0 !important;
    }

    .contract-grid .filter-row .col-md-6 {
        padding: 5px !important;
    }

    @media (max-width: 768px) {
        .contract-grid th, .contract-grid td {
            padding: 8px !important;
            font-size: 12px !important;
        }

        .contract-grid .form-control {
            font-size: 12px !important;
            padding: 6px !important;
        }
    }
</style>

<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $searchModel \backend\models\search\QuanLyPhongKhachSearch */

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'header' => 'STT',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%'],
        'contentOptions' => ['class' => 'text-center align-middle']
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Mã hợp đồng',
        'attribute' => 'ma_hop_dong',
        'headerOptions' => ['width' => '5%'],
        'contentOptions' => ['class' => 'text-center align-middle'],
        'value' => function ($data) {
            return '<span class="text-primary font-weight-bold">' . Html::encode($data->ma_hop_dong) . '</span>';
        },
        'format' => 'raw',
        'filter' => Html::activeTextInput(
            $searchModel,
            'ma_hop_dong',
            ['class' => 'form-control', 'placeholder' => 'Mã HĐ']
        )
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Khách hàng',
        'attribute' => 'khach_hang_id',
        'headerOptions' => ['width' => '20%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'align-middle'],
        'value' => function ($data) {
            return '<strong>' . Html::encode($data->hoten) . '</strong> <span><i class="fa fa-phone"></i> ' . Html::encode($data->dien_thoai) . '</span>';
        },
        'format' => 'raw',
        'filter' => Html::activeTextInput(
                $searchModel,
                'hoten',
                ['class' => 'form-control', 'placeholder' => 'Tên khách']
            ) . Html::activeTextInput(
                $searchModel,
                'dien_thoai',
                ['class' => 'form-control', 'placeholder' => 'Điện thoại']
            )
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Sale',
        'attribute' => 'sale_id',
        'headerOptions' => ['width' => '20%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'align-middle'],
        'value' => function ($data) {
            return $data->hoten_sale == null ? 'Không có sale' : '<strong>' . Html::encode($data->hoten_sale) . '</strong> <i class="fa fa-phone"></i> ' . Html::encode($data->dien_thoai_sale);
        },
        'format' => 'raw',
        'filter' => Html::activeTextInput(
                $searchModel,
                'hoten_sale',
                ['class' => 'form-control', 'placeholder' => 'Tên sale']
            ) . Html::activeTextInput(
                $searchModel,
                'dien_thoai_sale',
                ['class' => 'form-control', 'placeholder' => 'Điện thoại sale']
            )
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Phòng',
        'attribute' => 'phong_id',
        'headerOptions' => ['width' => '10%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center align-middle'],
        'value' => function ($data) {
            return Html::encode($data->ten_phong) . '/' . Html::encode($data->ten_toa_nha);
        },
        'format' => 'raw',
        'filter' => Html::activeTextInput(
                $searchModel,
                'ten_phong',
                ['class' => 'form-control', 'placeholder' => 'Số phòng']
            ) . Html::activeTextInput(
                $searchModel,
                'ten_toa_nha',
                ['class' => 'form-control', 'placeholder' => 'Tên tòa nhà']
            )
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Đơn giá',
        'attribute' => 'don_gia',
        'headerOptions' => ['width' => '5%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center align-middle'],
        'value' => function ($data) {
            return '<span class="money">' . number_format($data->don_gia, 0, ',', '.') . ' VNĐ</span>';
        },
        'format' => 'raw',
        'filter' => false
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Thời gian hợp đồng',
        'attribute' => 'thoi_gian_hop_dong_tu',
        'headerOptions' => ['width' => '20%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center align-middle'],
        'value' => function ($data) {
            $hienThiTu = DateTime::createFromFormat('Y-m-d H:i:s', $data->thoi_gian_hop_dong_tu)->format('d/m/Y');
            $hienThiDen = DateTime::createFromFormat('Y-m-d H:i:s', $data->thoi_gian_hop_dong_den)->format('d/m/Y');
            return 'Từ <strong>' . $hienThiTu . '</strong> đến <strong>' . $hienThiDen . '</strong>';
        },
        'format' => 'raw',
        'filter' => '<div class="row"><div class="col-md-6">' . Html::activeTextInput(
                $searchModel,
                'thoi_gian_hop_dong_tu',
                ['class' => 'form-control', 'placeholder' => 'Từ-từ', 'id' => 'thoi-gian-tu-tu']
            ) . '</div><div class="col-md-6">' . Html::activeTextInput(
                $searchModel,
                'chiet_khau',
                ['class' => 'form-control', 'placeholder' => 'Từ-đến', 'id' => 'thoi-gian-tu-den']
            ) . '</div></div><div class="row"><div class="col-md-6">' . Html::activeTextInput(
                $searchModel,
                'thoi_gian_hop_dong_den',
                ['class' => 'form-control', 'placeholder' => 'Đến-từ', 'id' => 'thoi-gian-den-tu']
            ) . '</div><div class="col-md-6">' . Html::activeTextInput(
                $searchModel,
                'created',
                ['class' => 'form-control', 'placeholder' => 'Đến-đến', 'id' => 'thoi-gian-den-den']
            ) . '</div></div>'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Thành tiền',
        'attribute' => 'thanh_tien',
        'headerOptions' => ['width' => '5%'],
        'contentOptions' => ['class' => 'text-center align-middle'],
        'value' => function ($data) {
            return '<span class="money">' . number_format($data->thanh_tien, 0, ',', '.') . ' VNĐ</span>';
        },
        'format' => 'raw',
        'filter' => false
    ],
    [
        'header' => 'Cọc',
        'value' => function ($data) {
            return $data->thanh_tien == $data->da_thanh_toan ? '<span class="text-success"><i class="fa fa-check"></i> Đã thanh toán</span>' : \yii\bootstrap\Html::a('<i class="fa fa-money"></i>', Url::toRoute(['phong-khach/thanh-toan', 'id' => $data->id]), ['role' => 'modal-remote', 'data-toggle' => 'tooltip', 'id' => 'btn-purchase']);
        },
        'format' => 'raw',
        'headerOptions' => ['width' => '5%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center align-middle'],
    ],
    [
        'header' => 'Xem',
        'value' => function ($data) {
            return Html::a('<i class="fa fa-eye"></i>', Url::toRoute(['phong-khach/view', 'id' => $data->id]), ['role' => 'modal-remote', 'data-toggle' => 'tooltip', 'id' => 'btn-view']);
        },
        'format' => 'raw',
        'headerOptions' => ['width' => '5%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center align-middle'],
    ],
    [
        'header' => 'Sửa',
        'value' => function ($data) {
            return Html::a('<i class="fa fa-edit"></i>', '#', ['data-value' => $data->id, 'data-pjax' => 0, 'id' => 'btn-sua-hop-dong']);
        },
        'format' => 'raw',
        'headerOptions' => ['width' => '5%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center align-middle'],
    ],
    [
        'header' => 'Xác nhận',
        'value' => function ($data) {
            return Html::a('Tháng trước', '#', ['class' => 'text-primary btn-hoan-thanh', 'data-value' => $data->id, 'loai' => 'truoc']) . '<br/>' .
                Html::a('Tháng này', '#', ['class' => 'text-success btn-hoan-thanh', 'data-value' => $data->id, 'loai' => 'nay']);
        },
        'format' => 'raw',
        'headerOptions' => ['width' => '5%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center align-middle'],
    ],
    [
        'header' => 'Xóa',
        'headerOptions' => ['class' => 'text-center', 'width' => '5%'],
        'contentOptions' => ['class' => 'text-center align-middle'],
        'value' => function ($data) {
            if ($data->active == 1) {
                return Html::a('<i class="fa fa-trash"></i>', '#', ['class' => 'text-danger btn-xoa-hop-dong', 'data-value' => $data->id]);
            }
            return '';
        },
        'format' => 'raw'
    ]
];
?>