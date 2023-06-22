<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\NtHoaDon $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nt Hoa Dons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nt-hoa-don-view">

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
            'id_phong',
            'thang',
            'nam',
            'so_dien_truoc',
            'so_dien_sau',
            'so_nuoc_truoc',
            'so_nuoc_sau',
            'ngay_ghi_dien_nuoc',
            'tong_tien',
            'da_thanh_toan',
            'ngay_thanh_toan',
            'ghi_chu:ntext',
            'date_created',
            'user_created',
        ],
    ]) ?>

</div>
