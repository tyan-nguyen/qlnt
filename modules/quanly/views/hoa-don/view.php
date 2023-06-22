<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\HoaDon */
?>
<div class="hoa-don-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_phong',
            'thang',
            'nam',
            'so_dien_truoc',
            'so_dien_sau',
            'so_nuoc_truoc',
            'so_nuoc_sau',
            'ngay_ghi_dien_nuoc',
            'tong_tien',
            'da_thanh_toan',
            'ngay_thanh_toan',
            'ghi_chu:ntext',
            'date_created',
            'user_created',
        ],
    ]) ?>

</div>
