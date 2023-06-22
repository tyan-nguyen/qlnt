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
        'attribute'=>'ten_day',
        'format' => 'raw',
        //'filter'=>false,
        'value'=>function($model){
            return Html::a($model->ten_day, Yii::getAlias('@web/quanly/day/view?id=') . $model->id, 
                ['role'=>'modal-remote', 'class'=>'alink']);
        },
        'options'=>['style'=>'width:20%']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id',
        'label'=>'Số phòng',
        'filter'=>false,
        'format' => 'raw',
        'value'=>function($model){
            $soPhong = count($model->ntPhongs);
            return '<span class="badge rounded-pill text-bg-primary">'. 
                Html::a($soPhong . ' phòng', Yii::getAlias('@web/quanly/phong/index?PhongSearch[id_day]=') . $model->id,
                ['class'=>'blink'])
                .'</span>';
        },
        'options'=>['style'=>'width:10%;'],
        'contentOptions'=>['style'=>'text-align:center'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ghi_chu',
        'filter'=>false,
    ],
        /*  [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'date_created',
         ],
         [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'user_created',
         ], */
        /* [
         'class' => 'kartik\grid\ActionColumn',
         'dropdown' => false,
         'vAlign'=>'middle',
         'urlCreator' => function($action, $model, $key, $index) {
         return Url::to([$action,'id'=>$key]);
         },
         'options'=>['style'=>'width:50px'],
         'header' => '',
         'template' => '{delete}',
         'viewOptions'=>['role'=>'modal-remote','title'=>'Xem','data-toggle'=>'tooltip', 'class'=>'btn btn-sm btn-outline-primary'],
         'updateOptions'=>['role'=>'modal-remote','title'=>'Cập nhật', 'data-toggle'=>'tooltip', 'class'=>'btn btn-sm btn-outline-success'],
         'deleteOptions'=>['role'=>'modal-remote','title'=>'Xóa',
         'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
         'class'=>'btn btn-sm btn-outline-danger',
         'data-request-method'=>'post',
         'data-toggle'=>'tooltip',
         'data-confirm-title'=>'Xác nhận xóa?',
         'data-confirm-message'=>'Bạn có chắc muốn xóa?'],
         ], */
        
        ];   