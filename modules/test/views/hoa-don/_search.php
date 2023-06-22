<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NtHoaDonSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nt-hoa-don-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_phong') ?>

    <?= $form->field($model, 'thang') ?>

    <?= $form->field($model, 'nam') ?>

    <?= $form->field($model, 'so_dien_truoc') ?>

    <?php // echo $form->field($model, 'so_dien_sau') ?>

    <?php // echo $form->field($model, 'so_nuoc_truoc') ?>

    <?php // echo $form->field($model, 'so_nuoc_sau') ?>

    <?php // echo $form->field($model, 'ngay_ghi_dien_nuoc') ?>

    <?php // echo $form->field($model, 'tong_tien') ?>

    <?php // echo $form->field($model, 'da_thanh_toan') ?>

    <?php // echo $form->field($model, 'ngay_thanh_toan') ?>

    <?php // echo $form->field($model, 'ghi_chu') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'user_created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
