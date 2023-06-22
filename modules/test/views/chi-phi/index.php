<?php

use app\models\NtChiPhi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NtChiPhiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Nt Chi Phis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nt-chi-phi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nt Chi Phi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ten_chi_phi',
            'don_vi_tinh',
            'don_gia',
            'ghi_chu:ntext',
            //'is_hidden',
            //'is_blocked',
            //'date_created',
            //'user_created',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NtChiPhi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
