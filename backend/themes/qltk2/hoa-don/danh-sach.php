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
<?php
//use \yii\helpers\Html;
///* @var $dichVus \backend\models\ThietLapGia[] */
///* @var $results [] */
///* @var $typeHienThi string */
//$domain = \backend\models\CauHinh::findOne(['ghi_chu' => 'domain'])->content;
//?>

<!--<style>-->
<!--    .main-container {-->
<!--        width: 100%;-->
<!--        padding: 15px 0;-->
<!--    }-->
<!---->
<!--    .select-all-container {-->
<!--        margin-bottom: 20px;-->
<!--        padding: 10px 15px;-->
<!--        background-color: #f9f9f9;-->
<!--        border-radius: 8px;-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--    }-->
<!---->
<!--    .select-all-label {-->
<!--        font-size: 16px;-->
<!--        font-weight: 500;-->
<!--        margin-left: 8px;-->
<!--    }-->
<!---->
<!--    .chon-tat-ca {-->
<!--        transform: scale(1.4);-->
<!--        margin-right: 5px;-->
<!--    }-->
<!---->
<!--    .card-container {-->
<!--        display: flex;-->
<!--        flex-direction: column;-->
<!--        gap: 20px;-->
<!--        width: 100%;-->
<!--    }-->
<!---->
<!--    .room-card {-->
<!--        width: 100%;-->
<!--        border-radius: 10px !important;-->
<!--        box-shadow: 0 4px 12px rgba(0,0,0,0.12);-->
<!--        background-color: #fff;-->
<!--        overflow: hidden;-->
<!--        transition: transform 0.3s ease, box-shadow 0.3s ease;-->
<!--        display: flex;-->
<!--        flex-direction: row;-->
<!--    }-->
<!---->
<!--    .room-card:hover {-->
<!--        transform: translateY(-3px);-->
<!--        box-shadow: 0 8px 20px rgba(0,0,0,0.3);-->
<!--    }-->
<!---->
<!--    .card-header {-->
<!--        background-color: #4e9cea;-->
<!--        color: white;-->
<!--        padding: 20px;-->
<!--        font-weight: bold;-->
<!--        min-width: 200px;-->
<!--        display: flex;-->
<!--        flex-direction: column;-->
<!--        justify-content: space-between;-->
<!--    }-->
<!---->
<!--    .room-number {-->
<!--        font-size: 18px;-->
<!--        margin-bottom: 15px;-->
<!--    }-->
<!---->
<!--    .card-body {-->
<!--        padding: 20px;-->
<!--        flex: 1;-->
<!--        display: flex;-->
<!--        flex-wrap: wrap;-->
<!--    }-->
<!---->
<!--    .customer-info {-->
<!--        width: 100%;-->
<!--        margin-bottom: 15px;-->
<!--        padding-bottom: 10px;-->
<!--        border-bottom: 1px solid #eee;-->
<!--        font-size: 16px;-->
<!--    }-->
<!---->
<!--    .customer-name {-->
<!--        font-weight: 500;-->
<!--        color: #333;-->
<!--    }-->
<!---->
<!--    .info-column {-->
<!--        flex: 1;-->
<!--        min-width: 250px;-->
<!--        padding: 0 15px;-->
<!--    }-->
<!---->
<!--    .image-column {-->
<!--        width: 220px;-->
<!--        padding: 0 15px;-->
<!--    }-->
<!---->
<!--    .totals-column {-->
<!--        width: 220px;-->
<!--        padding: 0 15px;-->
<!--        display: flex;-->
<!--        flex-direction: column;-->
<!--        justify-content: space-between;-->
<!--    }-->
<!---->
<!--    .card-section {-->
<!--        margin-bottom: 20px;-->
<!--    }-->
<!---->
<!--    .section-title {-->
<!--        font-weight: bold;-->
<!--        color: #555;-->
<!--        margin-bottom: 10px;-->
<!--        display: block;-->
<!--        font-size: 15px;-->
<!--    }-->
<!---->
<!--    .info-row {-->
<!--        display: flex;-->
<!--        justify-content: space-between;-->
<!--        margin-bottom: 10px;-->
<!--        align-items: center;-->
<!--    }-->
<!---->
<!--    .info-label {-->
<!--        color: #555;-->
<!--        font-size: 14px;-->
<!--    }-->
<!---->
<!--    .info-value {-->
<!--        font-weight: 500;-->
<!--        text-align: right;-->
<!--        color: #333;-->
<!--    }-->
<!---->
<!--    .total-section {-->
<!--        background-color: #f9f9f9;-->
<!--        padding: 15px;-->
<!--        border-radius: 8px;-->
<!--        margin-top: auto;-->
<!--    }-->
<!---->
<!--    .total-info {-->
<!--        display: flex;-->
<!--        justify-content: space-between;-->
<!--        font-size: 15px;-->
<!--        font-weight: 500;-->
<!--        margin-bottom: 8px;-->
<!--    }-->
<!---->
<!--    .total-info.grand-total {-->
<!--        font-weight: 700;-->
<!--        font-size: 16px;-->
<!--        color: #333;-->
<!--        padding-top: 8px;-->
<!--        margin-top: 8px;-->
<!--        border-top: 1px dashed #ddd;-->
<!--    }-->
<!---->
<!--    .status-section {-->
<!--        text-align: center;-->
<!--        margin-top: 15px;-->
<!--    }-->
<!---->
<!--    .status-badge {-->
<!--        padding: 8px 15px;-->
<!--        border-radius: 20px;-->
<!--        font-weight: bold;-->
<!--        font-size: 14px;-->
<!--        display: inline-block;-->
<!--        min-width: 140px;-->
<!--    }-->
<!---->
<!--    .status-paid {-->
<!--        background-color: #e6f7ee;-->
<!--        color: #28a745;-->
<!--    }-->
<!---->
<!--    .status-unpaid {-->
<!--        background-color: #fbe9e7;-->
<!--        color: #dc3545;-->
<!--    }-->
<!---->
<!--    .electric-image {-->
<!--        width: 100%;-->
<!--        margin-bottom: 15px;-->
<!--        text-align: center;-->
<!--    }-->
<!---->
<!--    .electric-image img {-->
<!--        max-height: 160px;-->
<!--        width: 100%;-->
<!--        border-radius: 8px;-->
<!--        object-fit: cover;-->
<!--        box-shadow: 0 2px 5px rgba(0,0,0,0.1);-->
<!--    }-->
<!---->
<!--    .form-control {-->
<!--        width: 100%;-->
<!--        padding: 8px 10px;-->
<!--        border: 1px solid #ddd;-->
<!--        border-radius: 4px;-->
<!--        margin-bottom: 5px;-->
<!--        font-size: 14px;-->
<!--    }-->
<!---->
<!--    .input-group {-->
<!--        display: flex;-->
<!--        gap: 10px;-->
<!--        margin-bottom: 10px;-->
<!--    }-->
<!---->
<!--    .input-group .form-control {-->
<!--        flex: 1;-->
<!--        margin-bottom: 0;-->
<!--    }-->
<!---->
<!--    .delete-image {-->
<!--        color: #dc3545;-->
<!--        font-size: 13px;-->
<!--        text-decoration: none;-->
<!--        display: block;-->
<!--        text-align: center;-->
<!--        margin-top: 8px;-->
<!--    }-->
<!---->
<!--    .delete-image:hover {-->
<!--        text-decoration: underline;-->
<!--    }-->
<!---->
<!--    .action-btn {-->
<!--        color: #4e9cea;-->
<!--        cursor: pointer;-->
<!--        margin-left: 5px;-->
<!--    }-->
<!---->
<!--    .check-selection {-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        margin-top: 15px;-->
<!--    }-->
<!---->
<!--    .check-chon {-->
<!--        transform: scale(1.4);-->
<!--        margin-right: 8px;-->
<!--    }-->
<!---->
<!--    .special-info {-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        justify-content: space-between;-->
<!--    }-->
<!---->
<!--    .special-info .info-label {-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--    }-->
<!---->
<!--    .utility-fees {-->
<!--        background-color: #f5f8ff;-->
<!--        border-radius: 8px;-->
<!--        padding: 12px;-->
<!--    }-->
<!---->
<!--    .file-input-container {-->
<!--        margin-top: 10px;-->
<!--    }-->
<!---->
<!--    @media (max-width: 992px) {-->
<!--        .room-card {-->
<!--            flex-direction: column;-->
<!--        }-->
<!---->
<!--        .card-header {-->
<!--            width: 100%;-->
<!--            min-width: unset;-->
<!--        }-->
<!---->
<!--        .image-column, .totals-column {-->
<!--            width: 100%;-->
<!--        }-->
<!--    }-->
<!--</style>-->
<!---->
<!--<div class="main-container">-->
<!--    --><?php //if ($typeHienThi != 'hien_thi'): ?>
<!--        <div class="select-all-container">-->
<!--            --><?php //= Html::checkbox('check_all', false, ['class'=>'chon-tat-ca']) ?>
<!--            <span class="select-all-label">Chọn tất cả</span>-->
<!--        </div>-->
<!--    --><?php //endif; ?>
<!---->
<!--    <div class="card-container">-->
<!--        --><?php //foreach ($results as $result): ?>
<!--            <div class="room-card">-->
<!--                <div class="card-header">-->
<!--                    <div class="room-number">Phòng: --><?php //= $result['phong'] ?><!--</div>-->
<!--                    --><?php //if ($typeHienThi != 'hien_thi'): ?>
<!--                        <div class="check-selection">-->
<!--                            --><?php //= Html::checkbox('thanhToan[]', false, [
//                                'value' => $result['id'],
//                                'class' => 'check-chon'
//                            ]) ?>
<!--                        </div>-->
<!--                    --><?php //endif; ?>
<!--                </div>-->
<!---->
<!--                <div class="card-body">-->
<!--                    <div class="customer-info">-->
<!--                        <strong>Khách hàng:</strong> <span class="customer-name">--><?php //= $result['khach'] ?><!--</span>-->
<!--                    </div>-->
<!---->
<!--                    <div class="info-column">-->
<!--                        <div class="card-section">-->
<!--                            <span class="section-title">Thông tin thuê phòng</span>-->
<!--                            <div class="info-row">-->
<!--                                <span class="info-label">Tiền phòng:</span>-->
<!--                                <span class="info-value">--><?php //= $result['tien_phong'] ?><!--</span>-->
<!--                            </div>-->
<!---->
<!--                            --><?php //if ($typeHienThi == 'hien_thi'): ?>
<!--                                <div class="info-row">-->
<!--                                    <span class="info-label">Điện:</span>-->
<!--                                    <span class="info-value">--><?php //= $result['Điện'] ?><!--</span>-->
<!--                                </div>-->
<!--                                <div class="info-row">-->
<!--                                    <span class="info-label">Nước:</span>-->
<!--                                    <span class="info-value">--><?php //= $result['Nước'] ?><!--</span>-->
<!--                                </div>-->
<!--                            --><?php //endif; ?>
<!--                        </div>-->
<!---->
<!--                        --><?php //if ($typeHienThi == 'so_nuoc'): ?>
<!--                            <div class="card-section">-->
<!--                                <span class="section-title">Điện</span>-->
<!--                                <div class="input-group">-->
<!--                                    <div class="form-control">--><?php //= Html::textInput('dien_dau', $result['dien_dau'], ['class'=>'so-dau form-control text-right hien-thi-so-tien', 'placeholder' => 'Số đầu']) ?><!--</div>-->
<!--                                    <div class="form-control">--><?php //= Html::textInput('dien_cuoi', $result['dien_cuoi'], ['class'=>'so-cuoi form-control text-right hien-thi-so-tien', 'placeholder' => 'Số cuối']) ?><!--</div>-->
<!--                                </div>-->
<!--                                <div class="info-row">-->
<!--                                    <span class="info-label">Tiền điện:</span>-->
<!--                                    <span class="thanh-tien-dien info-value">--><?php //= $result['Điện'] ?><!--</span>-->
<!--                                </div>-->
<!--                                <div class="file-input-container">-->
<!--                                    --><?php //= Html::fileInput('anh_dien', null, ['class'=>'form-control anh-dien']) ?>
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="card-section">-->
<!--                                <span class="section-title">Nước</span>-->
<!--                                <div class="input-group">-->
<!--                                    <div class="form-control">--><?php //= Html::textInput('nuoc_dau', $result['nuoc_dau'], ['class'=>'so-nuoc-dau form-control text-right hien-thi-so-tien', 'placeholder' => 'Số đầu']) ?><!--</div>-->
<!--                                    <div class="form-control">--><?php //= Html::textInput('nuoc_cuoi', $result['nuoc_cuoi'] ?? '0', ['class'=>'so-nuoc-cuoi form-control text-right hien-thi-so-tien', 'placeholder' => 'Số cuối']) ?><!--</div>-->
<!--                                </div>-->
<!--                                <div class="info-row">-->
<!--                                    <span class="info-label">Tiền nước:</span>-->
<!--                                    <span class="thanh-tien-nuoc info-value">--><?php //= $result['Nước'] ?? '0' ?><!--</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //elseif ($typeHienThi != 'hien_thi'): ?>
<!--                            <div class="card-section">-->
<!--                                <span class="section-title">Điện</span>-->
<!--                                <div class="input-group">-->
<!--                                    <div class="form-control">--><?php //= Html::textInput('dien_dau', $result['dien_dau'], ['class'=>'so-dau form-control text-right hien-thi-so-tien', 'placeholder' => 'Số đầu']) ?><!--</div>-->
<!--                                    <div class="form-control">--><?php //= Html::textInput('dien_cuoi', $result['dien_cuoi'], ['class'=>'so-cuoi form-control text-right hien-thi-so-tien', 'placeholder' => 'Số cuối']) ?><!--</div>-->
<!--                                </div>-->
<!--                                <div class="info-row">-->
<!--                                    <span class="info-label">Tiền điện:</span>-->
<!--                                    <span class="thanh-tien-dien info-value">--><?php //= $result['Điện'] ?><!--</span>-->
<!--                                </div>-->
<!--                                <div class="file-input-container">-->
<!--                                    --><?php //= Html::fileInput('anh_dien', null, ['class'=>'form-control anh-dien']) ?>
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="card-section">-->
<!--                                <span class="section-title">Nước</span>-->
<!--                                <div class="special-info">-->
<!--                               <div>Số người: <span class="so-thanh-vien">--><?php //= $result['so_nguoi'] ?><!--</span>-->
<!--                                            --><?php //= Html::a('<i class="fa fa-edit"></i>', '#', ['class'=>'text-primary btn-update-member', 'title'=>'Chỉnh số người']) ?>
<!--                                        </div>-->
<!--                                </div>-->
<!--                                <div class="info-row">-->
<!--                                    <span class="info-label">Tiền nước:</span>-->
<!--                                    <span class="thanh-tien-nuoc info-value">--><?php //= $result['Nước'] ?? '0' ?><!--</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //endif; ?>
<!---->
<!--                        <div class="card-section utility-fees">-->
<!--                            <span class="section-title">Phí dịch vụ</span>-->
<!--                            <div class="info-row">-->
<!--                                <span class="info-label">Rác:</span>-->
<!--                                <span class="info-value">--><?php //= $result['Rác'] ?? '0' ?><!--</span>-->
<!--                            </div>-->
<!--                            <div class="info-row">-->
<!--                                <span class="info-label">Internet:</span>-->
<!--                                <span class="info-value">--><?php //= $result['Internet'] ?? '0' ?><!--</span>-->
<!--                            </div>-->
<!--                            <div class="info-row">-->
<!--                                <span class="info-label">Giặt:</span>-->
<!--                                <span class="info-value">--><?php //= $result['Giặt'] ?? '0' ?><!--</span>-->
<!--                            </div>-->
<!--                            <div class="info-row">-->
<!--                                <span class="info-label">Phụ phí:</span>-->
<!--                                <span class="info-value">-->
<!--                                    --><?php //= Html::textInput('phu_phi', $result['Phụ phí'] ?? '0', ['class'=>'phu-phi form-control text-right hien-thi-so-tien']) ?>
<!--                                </span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="image-column">-->
<!--                        <span class="section-title">Ảnh số điện</span>-->
<!--                        <div class="electric-image">-->
<!--                            --><?php //$src = $result['anhDien'] == '' ? $domain.'/hinh-anh/no-image.jpg' : $domain.'/hinh-anh/'.$result['anhDien'] ?>
<!--                            --><?php //= Html::a(
//                                '<img src="'.$src.'" alt="Ảnh điện" title="Xem ảnh điện">',
//                                $src,
//                                ['class'=>'example-image-link', 'data-lightbox'=>'roadtrip', 'target'=>'_blank']
//                            ) ?>
<!--                            --><?php //= Html::a('<i class="fa fa-trash"></i> Xóa', '#', ['class'=>'delete-image', 'title'=>'Xóa ảnh']) ?>
<!--                        </div>-->
<!---->
<!---->
<!---->
<!--                        <div class="total-section">-->
<!--                            <div class="total-info">-->
<!--                                <span>Tổng tiền:</span>-->
<!--                                <span class="tong_tien">--><?php //= $result['tong_tien'] ?><!--</span>-->
<!--                            </div>-->
<!--                            <div class="total-info">-->
<!--                                <span>Đã thanh toán:</span>-->
<!--                                <span>--><?php //= $result['da_thanh_toan'] ?><!--</span>-->
<!--                            </div>-->
<!--                            <div class="total-info grand-total">-->
<!--                                <span>Trạng thái:</span>-->
<!--                                <span>--><?php //= $result['trang_thai'] ?><!--</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="status-section">-->
<!--                            <div class="status-badge --><?php //= $result['trang_thai'] == 'GD đã thanh toán' ? 'status-paid' : 'status-unpaid' ?><!--">-->
<!--                                --><?php //= $result['trang_thai'] ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        --><?php //endforeach; ?>
<!--    </div>-->
<!--</div>-->