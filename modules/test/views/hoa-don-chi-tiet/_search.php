<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NtHoaDonChiTietSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nt-hoa-don-chi-tiet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_hoa_don') ?>

    <?= $form->field($model, 'id_chi_phi') ?>

    <?= $form->field($model, 'so_luong') ?>

    <?= $form->field($model, 'don_gia') ?>

    <?php // echo $form->field($model, 'thanh_tien') ?>

    <?php // echo $form->field($model, 'ghi_chu') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'user_created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
