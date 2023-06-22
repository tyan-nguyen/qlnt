<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NtHoaDonChiTiet $model */

$this->title = 'Create Nt Hoa Don Chi Tiet';
$this->params['breadcrumbs'][] = ['label' => 'Nt Hoa Don Chi Tiets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nt-hoa-don-chi-tiet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
