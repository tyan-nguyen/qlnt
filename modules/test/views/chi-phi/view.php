<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\NtChiPhi $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nt Chi Phis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nt-chi-phi-view">

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
            'ten_chi_phi',
            'don_vi_tinh',
            'don_gia',
            'ghi_chu:ntext',
            'is_hidden',
            'is_blocked',
            'date_created',
            'user_created',
        ],
    ]) ?>

</div>
