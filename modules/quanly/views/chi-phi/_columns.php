<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_chi_phi',
        'format' => 'raw',
        'value'=>function($model){
            return Html::a($model->ten_chi_phi, Yii::getAlias('@web/quanly/chi-phi/view?id=') . $model->id,
            ['role'=>'modal-remote', 'class'=>'alink']);
        },
        'options'=>['style'=>'width:20%']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'don_vi_tinh',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'don_gia',
        'value'=>function($model){
            return $model->showDonGia;
        },
        //'options'=>['style'=>'width:20%']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'is_hidden',
        'format'=>'raw',
        'value'=>function($model){
            return $model->is_hidden==1
            ?'<span class="badge rounded-pill text-bg-primary">ON</span>'
                :'<span class="badge rounded-pill text-bg-secondary">OFF</span>';
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'is_blocked',
        'format'=>'raw',
        'value'=>function($model){
            return $model->is_blocked==1
            ?'<span class="badge rounded-pill text-bg-primary">ON</span>'
                :'<span class="badge rounded-pill text-bg-secondary">OFF</span>';
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ghi_chu',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'date_created',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'user_created',
    // ],
   /*  [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Confirm delete?',
                          'data-confirm-message'=>'Are you sure delete?'], 
    ], */

];   