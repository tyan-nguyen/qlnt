<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NtChiPhi $model */

$this->title = 'Update Nt Chi Phi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nt Chi Phis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nt-chi-phi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
