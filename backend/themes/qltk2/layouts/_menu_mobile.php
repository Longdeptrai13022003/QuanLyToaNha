<?php
/** 12/9/2019 8:15 PM**/
/** Admin **/
/** shopht **/
use yii\helpers\Html;
use common\models\myAPI;
?>
<ul class="page-sidebar-menu" data-slide-speed="200" data-auto-scroll="true">
    <?php if(myAPI::isAccess2('DanhMuc', 'Index')
    || myAPI::isAccess2('DiemTrinhDo', 'Index')): ?>
    <li>
        <a href="javascript:;"><i class="fa fa-bars"></i> Danh mục <span class="arrow"></span></a>
        <ul class="sub-menu">
            <?php if(myAPI::isAccess2('DanhMuc', 'Index')): ?>
            <li>
                <?=Html::a('Danh mục', \yii\helpers\Url::to(['danh-muc/index']))?>
            </li>
            <?php endif; ?>
            <?php if(myAPI::isAccess2('DiemTrinhDo', 'Index')): ?>
            <li>
                <?=Html::a('<i class="fa fa-bars"></i> Thang điểm trình độ', \yii\helpers\Url::to(['diem-trinh-do/index']))?>
            </li>
            <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>

    <?php if(myAPI::isAccess2('PhongBan', 'Index')): ?>
        <li>
            <?=Html::a('<i class="fa fa-home"></i> Phòng ban', \yii\helpers\Url::to(['phong-ban/index']))?>
        </li>
    <?php endif; ?>
    <?php if(myAPI::isAccess2('User', 'Index')): ?>
        <li>
            <?=Html::a('<i class="fa fa-users"></i> Nhân sự', \yii\helpers\Url::to(['user/index']))?>
        </li>
    <?php endif; ?>


    <?php if(myAPI::isAccess2('TaiLieu', 'Huong-dan-su-dung')
    || myAPI::isAccess2('Cauhinh', 'Index')
    || myAPI::isAccess2('VaiTro', 'Index')
    || myAPI::isAccess2('ChucNang', 'Index')
    || myAPI::isAccess2('PhanQuyen', 'Index')): ?>
    <li>
        <a href="javascript:;">
            <i class="fa fa-bar-chart-o"></i> Hệ thống
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <?php if(myAPI::isAccess2('TaiLieu', 'Huong-dan-su-dung')): ?>
            <li>
                <?=Html::a('<i class="fa fa-file-pdf-o"></i> Hướng dẫn sử dụng', \yii\helpers\Url::toRoute(['tai-lieu/huong-dan-su-dung']))?>
            </li>
            <?php endif; ?>
            <?php if(myAPI::isAccess2('CauHinh', 'Index')): ?>
            <li>
                <?=Html::a('<i class="fa fa-cogs"></i> Cấu hình', Yii::$app->urlManager->createUrl(['cauhinh']))?>
            </li>
            <?php endif; ?>
            <?php if(myAPI::isAccess2('VaiTro', 'Index')): ?>
            <li>
                <?=Html::a('<i class="fa fa-users"></i> Vai trò', Yii::$app->urlManager->createUrl(['vai-tro']))?>
            </li>
            <?php endif; ?>
            <?php if(myAPI::isAccess2('ChucNang', 'Index')): ?>
            <li>
                <?=Html::a('<i class="fa fa-bars"></i> Chức năng', Yii::$app->urlManager->createUrl(['chuc-nang']))?>
            </li>
            <?php endif; ?>
            <?php if(myAPI::isAccess2('PhanQuyen', 'Index')): ?>
            <li>
                <?=Html::a('<i class="fa fa-users"></i> Phân quyền', Yii::$app->urlManager->createUrl(['phan-quyen']))?>
            </li>
            <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>
</ul>
