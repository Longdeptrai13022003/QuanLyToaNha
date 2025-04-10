<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $oCungs \backend\models\NguoiOCung[] */
?>
<div class="row">
    <div class="col-md-7">
        <h4 class="text-primary">THÔNG TIN NGƯỜI Ở CÙNG</h4>
        <table class="table text-nowrap table-striped">
            <thead>
            <tr>
                <th>Họ tên</th>
                <th>Điện thoại</th>
                <th>Thêm</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($oCungs)>0):?>
            <?php foreach ($oCungs as $oCung):?>
            <tr>
                <?= Html::hiddenInput('oCungID[]',$oCung->id) ?>
                <td><?= Html::textInput('ho_ten[]',$oCung->ho_ten,['class'=>'form-control'])?></td>
                <td><?= Html::textInput('dien_thoai[]',$oCung->dien_thoai,['class'=>'form-control'])?></td>
                <td><center><?= Html::a('<i class="fa fa-plus"></i>','#',['class' => 'text-primary btn-them-o-cung'])?></center></td>
                <td><center><?= Html::a('<i class="fa fa-trash"></i>','#',['class' => 'text-danger btn-xoa-o-cung'])?></center></td>
            </tr>
            <?php endforeach; ?>
            <?php else:?>
            <tr>
                <td><?= Html::textInput('ho_ten[]',null,['class'=>'form-control'])?></td>
                <td><?= Html::textInput('dien_thoai[]',null,['class'=>'form-control'])?></td>
                <td><center><?= Html::a('<i class="fa fa-plus"></i>','#',['class' => 'text-primary btn-them-o-cung'])?></center></td>
                <td><center><?= Html::a('<i class="fa fa-trash"></i>','#',['class' => 'text-danger btn-xoa-o-cung'])?></center></td>
            </tr>
            <?php endif;?>
            </tbody>
        </table>
    </div>
    <div class="col-md-5">
        <h4 class="text-primary">CHI PHÍ DỊCH VỤ <span id="ten_phong"></span></h4>
        <table class="table text-nowrap table-striped">
            <thead>
            <tr>
                <th>Dịch vụ</th>
                <th>Giá</th>
            </tr>
            </thead>
            <tbody id="bang_gia">
            </tbody>
        </table>
    </div>
</div>