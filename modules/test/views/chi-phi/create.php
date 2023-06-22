<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NtChiPhi $model */

$this->title = 'Create Nt Chi Phi';
$this->params['breadcrumbs'][] = ['label' => 'Nt Chi Phis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nt-chi-phi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
