<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NtDay $model */

$this->title = 'Update Nt Day: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nt Days', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nt-day-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
