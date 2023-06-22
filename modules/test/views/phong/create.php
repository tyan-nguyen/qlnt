<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NtPhong $model */

$this->title = 'Create Nt Phong';
$this->params['breadcrumbs'][] = ['label' => 'Nt Phongs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nt-phong-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
