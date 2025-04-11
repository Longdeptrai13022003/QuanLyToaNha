<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\GoiThue */
?>
<div class="goi-thue-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ky_hieu',
            'don_gia',
        ],
    ]) ?>

</div>
