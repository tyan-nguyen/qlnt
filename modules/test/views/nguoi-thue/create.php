<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NtNguoiThue $model */

$this->title = 'Create Nt Nguoi Thue';
$this->params['breadcrumbs'][] = ['label' => 'Nt Nguoi Thues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nt-nguoi-thue-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
