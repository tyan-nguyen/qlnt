<?php

use app\models\NtHoaDonChiTiet;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\NtHoaDonChiTietSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Nt Hoa Don Chi Tiets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nt-hoa-don-chi-tiet-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nt Hoa Don Chi Tiet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_hoa_don',
            'id_chi_phi',
            'so_luong',
            'don_gia',
            //'thanh_tien',
            //'ghi_chu:ntext',
            //'date_created',
            //'user_created',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NtHoaDonChiTiet $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
