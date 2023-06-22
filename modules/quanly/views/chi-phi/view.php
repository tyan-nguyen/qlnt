<?php

use yii\widgets\DetailView;
use app\modules\quanly\models\CFunc;
$cus = new CFunc();

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\ChiPhi */
?>
<div class="chi-phi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'ten_chi_phi',
            'don_vi_tinh',
            'don_gia' => [
                'attribute' => 'don_gia',
                'value' => $model->showDonGia
            ],
            'ghi_chu:ntext',
            'is_hidden'=>[
                'attribute' => 'is_hidden',
                'format'=>'raw',
                'value'=>$model->is_hidden==1
                    ?'<span class="badge rounded-pill text-bg-primary">ON</span>'
                    :'<span class="badge rounded-pill text-bg-secondary">OFF</span>',
            ],
            'is_blocked'=>[
                'attribute' => 'is_blocked',
                'format'=>'raw',
                'value'=>$model->is_blocked==1
                ?'<span class="badge rounded-pill text-bg-primary">ON</span>'
                :'<span class="badge rounded-pill text-bg-secondary">OFF</span>',
            ],
            'date_created'=>[
                'attribute' => 'date_created',
                'value' => $cus->convertYMDHISToDMYHID($model->date_created)
            ],
            //'user_created',
        ],
    ]) ?>

</div>
