<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NtNguoiThue $model */

$this->title = 'Update Nt Nguoi Thue: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nt Nguoi Thues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nt-nguoi-thue-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
