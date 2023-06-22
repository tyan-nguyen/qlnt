<?php

use app\models\NtHoaDon;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\NtHoaDonSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Nt Hoa Dons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nt-hoa-don-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nt Hoa Don', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_phong',
            'thang',
            'nam',
            'so_dien_truoc',
            //'so_dien_sau',
            //'so_nuoc_truoc',
            //'so_nuoc_sau',
            //'ngay_ghi_dien_nuoc',
            //'tong_tien',
            //'da_thanh_toan',
            //'ngay_thanh_toan',
            //'ghi_chu:ntext',
            //'date_created',
            //'user_created',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NtHoaDon $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
