<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NtDay $model */

$this->title = 'Create Nt Day';
$this->params['breadcrumbs'][] = ['label' => 'Nt Days', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nt-day-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
