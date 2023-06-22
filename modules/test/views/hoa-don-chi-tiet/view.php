<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\NtHoaDonChiTiet $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nt Hoa Don Chi Tiets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nt-hoa-don-chi-tiet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_hoa_don',
            'id_chi_phi',
            'so_luong',
            'don_gia',
            'thanh_tien',
            'ghi_chu:ntext',
            'date_created',
            'user_created',
        ],
    ]) ?>

</div>
