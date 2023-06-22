<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NtHoaDon $model */

$this->title = 'Create Nt Hoa Don';
$this->params['breadcrumbs'][] = ['label' => 'Nt Hoa Dons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nt-hoa-don-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
