<?php
use yii\helpers\Url;
/* @var $searchModel \backend\models\search\QuanLyKhachHangSearch */

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'header' => 'STT',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Ảnh đại diện',
        'attribute'=>'anhdaidien',
        'headerOptions' => ['width' => '1%'],
        'value' => function ($data) {
            $domain = \backend\models\CauHinh::findOne(['ghi_chu' => 'domain'])->content;
            return \yii\helpers\Html::img($data->anhdaidien == '' ? $domain.'/hinh-anh/no-image.jpg' : $domain.'/hinh-anh/'.$data->anhdaidien,[
                'width' => '150px',
                'class' => 'img-thumbnail',
                'id' => 'hinh-anh'
            ]);
        },
        'format'=>'raw',
        'filter'=>false
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Họ tên',
        'attribute'=>'hoten',
        'headerOptions' => ['width' => 'auto'],
        'filter' => \yii\helpers\Html::activeTextInput(
            $searchModel, 'hoten', [
                'class' => 'form-control',
                'placeholder' => 'Họ tên'
            ]
        )
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Số CCCD',
        'attribute'=>'so_cccd',
        'headerOptions' => ['width' => '1%'],
        'filter' => \yii\helpers\Html::activeTextInput(
            $searchModel, 'so_cccd', [
                'class' => 'form-control',
                'placeholder' => 'Số CCCD KH'
            ]
        )
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Điện thoại',
        'attribute'=>'dien_thoai',
        'headerOptions' => ['width' => '1%'],
        'filter' => \yii\helpers\Html::activeTextInput(
            $searchModel, 'dien_thoai', [
                'class' => 'form-control',
                'placeholder' => 'Điện thoại KH'
            ]
        )
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Tên đăng nhập',
        'headerOptions' => ['width' => '1%'],
        'attribute'=>'username',
        'filter' => \yii\helpers\Html::activeTextInput(
            $searchModel, 'username', [
                'class' => 'form-control',
                'placeholder' => 'Tên đăng nhập'
            ]
        )
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Email',
        'headerOptions' => ['width' => '1%'],
        'attribute'=>'email',
        'filter' => \yii\helpers\Html::activeTextInput(
            $searchModel, 'email', [
                'class' => 'form-control',
                'placeholder' => 'Email'
            ]
        )
    ],
    [
        'header' => 'Xem',
        'value' => function($data) {
            return \yii\bootstrap\Html::a('<i class="fa fa-eye"></i>',Url::toRoute(['user/view', 'id' => $data->id]), ['role' => 'modal-remote', 'data-toggle' => 'tooltip','id'=>'select2']);
        },
        'format' => 'raw',
        'headerOptions' => ['width' => '1%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center']
    ],
    [
        'header' => 'Sửa',
        'value' => function($data) {
            return \yii\bootstrap\Html::a('<i class="fa fa-edit"></i>',Url::toRoute(['user/update-khach-hang', 'id' => $data->id]), ['role' => 'modal-remote', 'data-toggle' => 'tooltip','id'=>'select2']);
        },
        'format' => 'raw',
        'headerOptions' => ['width' => '1%', 'class' => 'text-center'],
        'contentOptions' => ['class' => 'text-center']
    ],
    [
        'header' => 'Huỷ',
        'headerOptions' => ['class' => 'text-center', 'width' => '1%'],
        'contentOptions' => ['class' => 'text-center'],
        'value' => function($data){
            if($data->status == 10)
                return \yii\bootstrap\Html::a('<i class="fa fa-ban"></i>', '#', ['class' => 'text-danger btn-huy-khoi-phuc-hoat-dong', 'data-value' => $data->id]);
            return '';
        },
        'format' => 'raw'
    ]
];
?>

