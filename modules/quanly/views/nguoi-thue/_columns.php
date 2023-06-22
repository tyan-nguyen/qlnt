<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\quanly\models\Phong;
use app\widgets\ShowStatus;
use kartik\select2\Select2;
use kartik\grid\GridView;
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
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_phong',
        'value'=>function($model){
            return $model->phong->ten_phong;
        },
       'filter'=>Html::activeDropDownList($searchModel, 'id_phong', Phong::getListWithParent(), ['prompt'=>'-Chọn-', 'class'=>'form-control'])
    ], */
    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute' => 'idDay',
        'label' => 'Dãy',
        'value'=>function($model){
            return $model->phong->day->ten_day;
        },
        'filter' => Day::getList(),
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'options' => ['prompt' => '-----'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ],
        'options'=>['style'=>'width:15%']
        ],
    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute' => 'id_phong',
        'value'=>function($model){
            return $model->phong->ten_phong;
        },
        'filter' => Phong::getListWithParentID($searchModel->idDay),
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'options' => ['prompt' => '-----'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ],
        'options'=>['style'=>'width:15%']
    ],
        
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ho_ten',
        'format' => 'raw',
        'value'=>function($model){
            return Html::a($model->ho_ten, Yii::getAlias('@web/quanly/nguoi-thue/view?id=') . $model->id,
                ['role'=>'modal-remote', 'class'=>'alink']);
        },
        'options'=>['style'=>'width:20%']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ngay_sinh',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'gioi_tinh',
        'value'=>function($model){
            return $model->gioi_tinh==0?'Nam':'Nữ';
        },
        'filter'=>Html::activeDropDownList($searchModel, 'gioi_tinh', [0=>'Nam', 1=>'Nữ'],['prompt'=>'-----', 'class'=>'form-control'])
    ],
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'cccd',
    ], */
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'trang_thai',
        'format'=>'raw',
        'value'=>function($model){
            return ShowStatus::widget(['status'=>$model->trang_thai, 'text'=>'Đang thuê|Đang trống']);
        }
    ], */
    
    [
        'class' => '\kartik\grid\BooleanColumn',
        'attribute'=>'trang_thai',
        'trueLabel' => 'Đang thuê',
        'falseLabel' => 'Ngừng thuê'
        //'format'=>'raw',
        /* 'value'=>function($model){
            return ShowStatus::widget(['status'=>$model->trang_thai, 'text'=>'Đang thuê|Đang trống']);
        } */
    ],
        
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ngay_bat_dau_thue',
        'filter'=>false,
        'value'=>function($model){
            return $model->showNgayBatDauThue;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ngay_ngung_thue',
        'filter'=>false,
        'value'=>function($model){
            return $model->showNgayNgungThue;
        }
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ghi_chu',
    // ],
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