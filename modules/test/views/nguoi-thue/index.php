<?php

use app\models\NtNguoiThue;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NtNguoiThueSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Nt Nguoi Thues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nt-nguoi-thue-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nt Nguoi Thue', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_phong',
            'ho_ten',
            'ngay_sinh',
            'gioi_tinh',
            //'cccd',
            //'trang_thai',
            //'ngay_bat_dau_thue',
            //'ngay_ngung_thue',
            //'ghi_chu',
            //'date_created',
            //'user_created',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NtNguoiThue $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
