<?php

use yii\widgets\DetailView;
use app\modules\quanly\models\CFunc;
$cus = new CFunc();

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\Phong */
?>
<div class="phong-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'id_day'=>[
                'attribute' => 'id_day',
                'value' => $model->day->ten_day
            ],
            'ten_phong',
            'don_gia' => [
                'attribute' => 'don_gia',
                'value' => $model->showDonGia
            ],
            'ghi_chu:ntext',
            'date_created'=>[
                'attribute' => 'date_created',
                'value' => $cus->convertYMDHISToDMYHID($model->date_created)
            ],
            //'user_created',
        ],
    ]) ?>

</div>
