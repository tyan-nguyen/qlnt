<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NtHoaDonChiTiet $model */

$this->title = 'Update Nt Hoa Don Chi Tiet: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nt Hoa Don Chi Tiets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nt-hoa-don-chi-tiet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
