<?php

use yii\widgets\DetailView;
use app\modules\quanly\models\CFunc;
$cus = new CFunc();

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\Day */
?>
<div class="day-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'ten_day',
            'ghi_chu:ntext',
            'date_created'=>[
                'attribute' => 'date_created',
                'value' => $cus->convertYMDHISToDMYHID($model->date_created)
            ],
            //'user_created',
        ],
    ]) ?>

</div>
