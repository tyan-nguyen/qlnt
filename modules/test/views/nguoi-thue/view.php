<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\NtNguoiThue $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nt Nguoi Thues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nt-nguoi-thue-view">

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
            'ho_ten',
            'ngay_sinh',
            'gioi_tinh',
            'cccd',
            'trang_thai',
            'ngay_bat_dau_thue',
            'ngay_ngung_thue',
            'ghi_chu',
            'date_created',
            'user_created',
        ],
    ]) ?>

</div>
