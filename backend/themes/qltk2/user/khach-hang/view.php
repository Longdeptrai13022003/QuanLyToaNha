<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */
?>
<div class="tabbale-line">
    <div class="tab-content">
        <div class="tab-pane active">
            <div class="row">
                <div class="col-md-3">
                    <?=Html::a("<img  class='example-image img-responsive' src='hinh-anh/$model->anhdaidien' width='100%'>",
                        'hinh-anh/'.$model->anhdaidien,['class'=>'example-image-link img-thumbnail img-responsive','data-lightbox'=>'roadtrip',])?>
                </div>
                <div class="col-md-9 margin-top-35">
                    <p><strong>Họ tên:</strong> <?=$model->hoten?></p>
                    <p><strong>Điện thoại:</strong> <?=$model->dien_thoai?></p>
                    <p><strong>Tên đăng nhập:</strong> <?=$model->username ?></p>
                    <p><strong>Email:</strong> <?=$model->email ?></p>
                    <p><strong>Số CCCD:</strong> <?=$model->so_cccd ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><h4 class="text-primary">ẢNH 2 MẶT CCCD</h4></div>
                <?php if($model->anhcancuoc == ''): ?>
                    <div class="col-md-4">
                        <?=Html::a("<img  class='example-image img-responsive' src='hinh-anh/no-image.jpg' width='100%'>",
                            'hinh-anh/no-image.jpg',['class'=>'example-image-link img-thumbnail img-responsive','data-lightbox'=>'roadtrip','target'=>'_blank'])?>
                    </div>
                <?php else:?>
                    <?php $anhs =explode(',',$model->anhcancuoc)?>
                    <?php foreach ($anhs as $anh): ?>
                        <div class="col-md-4">
                            <?=Html::a("<img  class='example-image img-responsive' src='hinh-anh/$anh' width='100%'>",
                                'hinh-anh/'.$anh,['class'=>'example-image-link img-thumbnail img-responsive','data-lightbox'=>'roadtrip','target'=>'_blank'])?>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

