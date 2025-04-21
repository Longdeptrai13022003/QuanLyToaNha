<?php
use \yii\helpers\Html;
/* @var $dichVus \backend\models\ThietLapGia[] */
/* @var $results [] */
/* @var $typeHienThi string */
$domain = \backend\models\CauHinh::findOne(['ghi_chu' => 'domain'])->content;
?>

<style>
    table.table {
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        border-radius: 6px;
        overflow: hidden;
    }
    thead#tieu-de th {
        background: #4e9cea;
        color: #fff;
        text-align: center;
        vertical-align: middle !important;
    }
    tbody td {
        vertical-align: middle !important;
        text-align: center;
    }
    .form-control {
        padding: 6px 10px;
        height: 34px;
        border-radius: 4px;
    }
    .img-thumbnail {
        max-height: 100px;
        border-radius: 4px;
    }
    .xoa-anh {
        font-size: 13px;
        display: block;
        margin-top: 6px;
    }
    .table-hover > tbody > tr:hover {
        background-color: #f1f1f1;
    }
    .text-success {
        color: #28a745 !important;
    }
    .text-danger {
        color: #dc3545 !important;
    }
    .check-all, .check-chon {
        transform: scale(1.4);
    }
    .btn-update-member {
        margin-left: 5px;
    }
    .status-paid {
        color: #28a745;
        font-weight: bold;
    }
    .status-unpaid {
        color: #dc3545;
        font-weight: bold;
    }
</style>

<table class="table table-bordered table-striped text-nowrap">
    <thead id="tieu-de">
    <tr>
        <?php if ($typeHienThi != 'hien_thi'):?>
            <th width="1%">
                Chọn<br>
                <span class="check-all">
                    <?= Html::checkbox('check_all', false, ['class'=>'chon-tat-ca']) ?>
                </span>
            </th>
        <?php endif; ?>
        <th>Phòng</th>
        <th>Khách hàng</th>
        <th>Tiền phòng</th>
        <th>Ảnh số điện</th>
        <th>Điện</th>
        <th>Nước</th>
        <th>Rác</th>
        <th>Internet</th>
        <th>Giặt</th>
        <th>Phụ phí</th>
        <th>Tổng tiền</th>
        <th>Đã TT</th>
        <th>Trạng thái</th>
    </tr>
    </thead>
    <tbody id="hoaDons">
    <?php foreach ($results as $result):?>
        <tr>
            <?php if ($typeHienThi != 'hien_thi'):?>
                <td><?= Html::checkbox('thanhToan[]', false, [
                        'value' => $result['id'],
                        'class' => 'check-chon'
                    ]) ?></td>
            <?php endif;?>
            <td><?= $result['phong'] ?></td>
            <td><?= $result['khach'] ?></td>
            <td><span class="pull-right"><?= $result['tien_phong'] ?></span></td>
            <td>
                <?php $src = $result['anhDien'] == '' ? $domain.'/hinh-anh/no-image.jpg' : $domain.'/hinh-anh/'.$result['anhDien'] ?>
                <div>
                    <?= Html::a(
                        '<img class="img-responsive img-thumbnail" src="'.$src.'" alt="Ảnh điện" title="Xem ảnh điện">',
                        $src,
                        ['class'=>'example-image-link', 'data-lightbox'=>'roadtrip', 'target'=>'_blank']
                    ) ?>
                </div>
                <?= Html::a('<i class="fa fa-trash"></i> Xóa', '#', ['class'=>'xoa-anh text-danger', 'title'=>'Xóa ảnh']) ?>
            </td>

            <?php if ($typeHienThi == 'hien_thi'):?>
                <td><span class="pull-right"><?= $result['Điện'] ?></span></td>
                <td><span class="pull-right"><?= $result['Nước'] ?></span></td>
            <?php elseif ($typeHienThi == 'so_nuoc'):?>
                <td>
                    <div class="row">
                        <div class="col-xs-6"><?= Html::textInput('dien_dau', $result['dien_dau'], ['class'=>'so-dau form-control text-right hien-thi-so-tien']) ?></div>
                        <div class="col-xs-6"><?= Html::textInput('dien_cuoi', $result['dien_cuoi'], ['class'=>'so-cuoi form-control text-right hien-thi-so-tien']) ?></div>
                    </div>
                    <div>Tiền điện: <span class="pull-right thanh-tien-dien"><?= $result['Điện'] ?></span></div>
                    <?= Html::fileInput('anh_dien', null, ['class'=>'form-control anh-dien']) ?>
                </td>
                <td>
                    <div class="row">
                        <div class="col-xs-6"><?= Html::textInput('nuoc_dau', $result['nuoc_dau'], ['class'=>'so-nuoc-dau form-control text-right hien-thi-so-tien']) ?></div>
                        <div class="col-xs-6"><?= Html::textInput('nuoc_cuoi', $result['nuoc_cuoi'] ?? '0', ['class'=>'so-nuoc-cuoi form-control text-right hien-thi-so-tien']) ?></div>
                    </div>
                    <div>Tiền nước: <span class="pull-right thanh-tien-nuoc"><?= $result['Nước'] ?? '0' ?></span></div>
                </td>
            <?php else:?>
                <td>
                    <div class="row">
                        <div class="col-xs-6"><?= Html::textInput('dien_dau', $result['dien_dau'], ['class'=>'so-dau form-control text-right hien-thi-so-tien']) ?></div>
                        <div class="col-xs-6"><?= Html::textInput('dien_cuoi', $result['dien_cuoi'], ['class'=>'so-cuoi form-control text-right hien-thi-so-tien']) ?></div>
                    </div>
                    <div>Tiền điện: <span class="pull-right thanh-tien-dien"><?= $result['Điện'] ?></span></div>
                    <?= Html::fileInput('anh_dien', null, ['class'=>'form-control anh-dien']) ?>
                </td>
                <td>
                    <div>Số người: <span class="so-thanh-vien"><?= $result['so_nguoi'] ?></span>
                        <?= Html::a('<i class="fa fa-edit"></i>', '#', ['class'=>'text-primary btn-update-member', 'title'=>'Chỉnh số người']) ?>
                    </div>
                    Tiền nước: <span class="pull-right thanh-tien-nuoc"><?= $result['Nước'] ?? '0' ?></span>
                </td>
            <?php endif;?>

            <td><span class="pull-right"><?= $result['Rác'] ?? '0' ?></span></td>
            <td><span class="pull-right"><?= $result['Internet'] ?? '0' ?></span></td>
            <td><span class="pull-right"><?= $result['Giặt'] ?? '0' ?></span></td>
            <td><span class="pull-right">
                <?= Html::textInput('phu_phi', $result['Phụ phí'] ?? '0', ['class'=>'phu-phi form-control text-right hien-thi-so-tien']) ?>
            </span></td>
            <td><span class="pull-right tong_tien"><?= $result['tong_tien'] ?></span></td>
            <td><span class="pull-right"><?= $result['da_thanh_toan'] ?></span></td>
            <td>
                <span class="pull-right <?= $result['trang_thai'] == 'GD đã thanh toán' ? 'status-paid' : 'status-unpaid' ?>">
                    <?= $result['trang_thai'] ?>
                </span>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
