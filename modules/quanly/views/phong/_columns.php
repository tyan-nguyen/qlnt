<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\quanly\models\Day;

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
        'attribute'=>'id_day',
        'value'=>function($model){
            return $model->day->ten_day;
        },
        'filter'=>Html::activeDropDownList($searchModel, 'id_day', Day::getList(), ['prompt'=>'-Chọn-', 'class'=>'form-control']),
        'options'=>['style'=>'width:10%']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_phong',
        'format' => 'raw',
        'value'=>function($model){
            return Html::a($model->ten_phong, Yii::getAlias('@web/quanly/phong/view?id=') . $model->id,
                ['role'=>'modal-remote', 'class'=>'alink']);
        },
        'options'=>['style'=>'width:10%']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'don_gia',
        'value'=>function($model){            
            return $model->showDonGia;
        },
        'options'=>['style'=>'width:10%']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id',
        'label'=>'Trạng thái',
        'filter'=>false,
        'format' => 'raw',
        'value'=>function($model){
            return Html::a($model->trangThaiPhong==1
                ?'<span class="badge rounded-pill text-bg-primary">Đang thuê</span>'
                :'<span class="badge rounded-pill text-bg-secondary">Đang trống</span>', Yii::getAlias('@web/quanly/nguoi-thue/index?NguoiThueSearch[id_phong]=') . $model->id,
                ['class'=>'alink']);
        },
        'options'=>['style'=>'width:10%;'],
        'contentOptions'=>['style'=>'text-align:center'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id',
        'label'=>'Người thuê',
        'filter'=>false,
        'value'=>function($model){
            return $model->showNguoiThue;
        },
        'options'=>['style'=>'width:10%']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ghi_chu',
        'options'=>['style'=>'width:40%']
    ],
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'date_created',
    ], */
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'user_created',
    // ],
    /* [
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