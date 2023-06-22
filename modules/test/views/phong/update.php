<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NtPhong $model */

$this->title = 'Update Nt Phong: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nt Phongs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nt-phong-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
