<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\HoaDonChiTiet */
?>
<div class="hoa-don-chi-tiet-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_hoa_don',
            'id_chi_phi',
            'so_luong',
            'don_gia',
            'thanh_tien',
            'ghi_chu:ntext',
            'date_created',
            'user_created',
        ],
    ]) ?>

</div>
