<?php
use \yii\helpers\Html;
/* @var $dichVus \backend\models\ThietLapGia[] */
/* @var $results [] */
/* @var $typeHienThi string */
$domain = \backend\models\CauHinh::findOne(['ghi_chu' => 'domain'])->content;
?>
<table class="table text-nowrap">
    <thead id="tieu-de">
    <tr>
        <?php if ($typeHienThi != 'hien_thi'):?>
        <th width="1%">Chọn&nbsp;&nbsp;<span class="check-all">
                <?=Html::checkbox('check_all',false,['class'=>'chon-tat-ca','style'=>'transform: scale(1.5);'])?>
            </span></th>
        <?php endif; ?>
        <th width="1%">Phòng</th>
        <th width="1%">Khách hàng</th>
        <th width="1%">Tiền phòng</th>
        <th width="1%">Ảnh số điện</th>
        <th width="15%">Điện</th>
        <th width="1%">Nước</th>
        <th width="1%">Rác</th>
        <th width="1%">Internet</th>
        <th width="1%">Giặt</th>
        <th width="10%">Phụ phí</th>
        <th width="1%">Tổng tiền</th>
        <th width="1%">Đã TT</th>
        <th width="1%">Trạng thái</th>
    </tr>
    </thead>
    <tbody id="hoaDons">
    <?php foreach ($results as $result):?>
    <tr>
        <?php if ($typeHienThi != 'hien_thi'):?>
            <td><?= Html::checkbox('thanhToan[]',false,['style'=>'transform: scale(1.5);','value' => $result['id'],'class'=>'check-chon'])?></td>
        <?php endif;?>
        <td><?=$result['phong']?></td>
        <td><?=$result['khach']?></td>
        <td><span class="pull-right"><?=$result['tien_phong']?></span></td>
        <td>
            <?php $src = $result['anhDien'] == '' ? $domain.'/hinh-anh/no-image.jpg' : $domain.'/hinh-anh/'.$result['anhDien']?>
            <div><?=Html::a('<img  class="example-image img-responsive" src="'.$src.'" width="100%">',
                    $src,['class'=>'example-image-link img-thumbnail img-responsive','data-lightbox'=>'roadtrip','target' => '_blank'])?></div>
            <?= Html::a('<i class="fa fa-trash"></i> Xóa','#',['class' => 'text-danger xoa-anh'])?>
        </td>
        <?php if ($typeHienThi == 'hien_thi'):?>
            <td><span class="pull-right"><?=$result['Điện']?></span></td>
            <td><span class="pull-right"><?=$result['Nước']?></span></td>
        <?php elseif ($typeHienThi == 'so_nuoc'):?>
            <td>
                <div class="row">
                    <div class="col-md-6"><?=Html::textInput('dien_dau',$result['dien_dau'],['class' => 'so-dau form-control text-right hien-thi-so-tien'])?></div>
                    <div class="col-md-6"><?=Html::textInput('dien_cuoi',$result['dien_cuoi'],['class' => 'so-cuoi form-control text-right hien-thi-so-tien'])?></div>
                </div>
                <div>Tiền điện: <span class="pull-right thanh-tien-dien"><?=$result['Điện']?></span></div>
                <div><?= Html::fileInput('anh_dien',null,['class'=>'form-control anh-dien'])?></div>
            </td>
            <td>
                <div class="row">
                    <div class="col-md-6"><?=Html::textInput('nuoc_dau',$result['nuoc_dau'],['class' => 'so-nuoc-dau form-control text-right hien-thi-so-tien'])?></div>
                    <div class="col-md-6"><?=Html::textInput('nuoc_cuoi',array_key_exists('nuoc_cuoi', $result) ? $result['nuoc_cuoi'] : '0',['class' => 'so-nuoc-cuoi form-control text-right hien-thi-so-tien'])?></div>
                </div>
                Tiền nước: <span class="pull-right thanh-tien-nuoc"><?=array_key_exists('Nước', $result) ? $result['Nước'] : '0'?></span>
            </td>
        <?php else:?>
            <td>
                <div class="row">
                    <div class="col-md-6"><?=Html::textInput('dien_dau',$result['dien_dau'],['class' => 'so-dau form-control text-right hien-thi-so-tien'])?></div>
                    <div class="col-md-6"><?=Html::textInput('dien_cuoi',$result['dien_cuoi'],['class' => 'so-cuoi form-control text-right hien-thi-so-tien'])?></div>
                </div>
                <div>Tiền điện: <span class="pull-right thanh-tien-dien"><?=$result['Điện']?></span></div>
                <div><?= Html::fileInput('anh_dien',null,['class'=>'form-control anh-dien'])?></div>
            </td>
        <td>
            <div>Số người: <span class="so-thanh-vien"><?=$result['so_nguoi']?></span> <?=Html::a('<i class="fa fa-edit"></i>','#',['class'=>'text-primary btn-update-member'])?></div>
            Tiền nước: <span class="pull-right thanh-tien-nuoc"><?= array_key_exists('Nước', $result) ? $result['Nước'] : '0' ?></span>
        </td>
        <?php endif;?>
        <td><span class="pull-right"><?= array_key_exists('Rác', $result) ? $result['Rác'] : '0' ?></span></td>
        <td><span class="pull-right"><?= array_key_exists('Internet', $result) ? $result['Internet'] : '0' ?></span></td>
        <td><span class="pull-right"><?= array_key_exists('Giặt', $result) ? $result['Giặt'] : '0' ?></span></td>
        <td><span class="pull-right"><?= Html::textInput('phu_phi',array_key_exists('Phụ phí', $result) ? $result['Phụ phí'] : '0',['class'=>'phu-phi form-control text-right hien-thi-so-tien']) ?></span></td>
        <td><span class="pull-right tong_tien"><?=$result['tong_tien']?></span></td>
        <td><span class="pull-right"><?=$result['da_thanh_toan']?></span></td>
        <td><span class="pull-right"><?=$result['trang_thai']?></span></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>