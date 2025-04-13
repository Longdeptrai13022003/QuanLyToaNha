<?php
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $searchModel \backend\models\search\TrangThaiSearch*/

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '1%'
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'header' => 'STT',
        'headerOptions' => ['class' => 'text-primary'],
        'width' => '1%'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Mã trạng thái',
        'vAlign'=>'middle',
        'attribute'=>'id',
        'headerOptions' => ['width' => '10%'],
        'filter' => Html::activeTextInput(
            $searchModel, 'id',
            [
                'placeholder' => 'Mã trạng thái',
                'class' => 'form-control'
            ]
        )
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Tên trạng thái',
        'vAlign'=>'middle',
        'attribute'=>'ten',
        'headerOptions' => ['width' => '20%'],
        'filter' => Html::activeTextInput(
            $searchModel, 'ten',
            [
                'placeholder' => 'Tên trạng thái',
                'class' => 'form-control'
            ]
        )
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Loại trạng thái',
        'vAlign'=>'middle',
        'format' => 'raw',
        'attribute'=>'loai_trang_thai',
        'headerOptions' => ['width' => '20%'],
        'value' => function ($model) {
            return $model->getTypeLabelWithStyle();
        },
        'filter' => \yii\helpers\Html::activeDropDownList(
            $searchModel,
            'loai_trang_thai',
            \backend\models\TrangThai::getTypeList(),
            ['class' => 'form-control', 'prompt' => 'Tất cả']
        ),
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Ghi chú',
        'vAlign'=>'middle',
        'attribute'=>'ghi_chu',
        'headerOptions' => ['width' => '30%'],
        'filter' => Html::activeTextInput(
            $searchModel, 'ghi_chu',
            [
                'placeholder' => 'Ghi chú',
                'class' => 'form-control'
            ]
        )
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'headerOptions' => ['width' => 'auto'],
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   