<?php

use yii\widgets\DetailView;
use app\modules\quanly\models\CFunc;
use app\widgets\ShowStatus;
$cus = new CFunc();
/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\NguoiThue */
?>
<div class="nguoi-thue-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'id_phong'=>[
                'attribute'=>'id_phong',
                'value'=>$model->phong->ten_phong
            ],
            'ho_ten',
            'ngay_sinh',
            'gioi_tinh'=>[
                'attribute'=>'gioi_tinh',
                'value'=>$model->gioi_tinh==1?'Nam':'Nữ'
            ],
            'cccd',
            'trang_thai'=>[
                'attribute'=>'trang_thai',
                'format'=>'raw',
                //'value'=>$model->trang_thai==1?'Ngưng thuê':'Đang thuê'
                'value'=>ShowStatus::widget(['status'=>$model->trang_thai, 'text'=>'Ngừng thuê|Đang thuê'])
            ],
            'ngay_bat_dau_thue'=>[
                'attribute' => 'ngay_bat_dau_thue',
                'value' => $model->ngay_bat_dau_thue!=null?$cus->convertYMDToDMY($model->ngay_bat_dau_thue):''
            ],
            'ngay_ngung_thue'=>[
                'attribute' => 'ngay_ngung_thue',
                'value' => $model->ngay_ngung_thue!=null?$cus->convertYMDToDMY($model->ngay_ngung_thue):''
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
