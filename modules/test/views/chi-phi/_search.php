<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NtChiPhiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nt-chi-phi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ten_chi_phi') ?>

    <?= $form->field($model, 'don_vi_tinh') ?>

    <?= $form->field($model, 'don_gia') ?>

    <?= $form->field($model, 'ghi_chu') ?>

    <?php // echo $form->field($model, 'is_hidden') ?>

    <?php // echo $form->field($model, 'is_blocked') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'user_created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
