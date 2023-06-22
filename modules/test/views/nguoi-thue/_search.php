<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NtNguoiThueSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nt-nguoi-thue-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_phong') ?>

    <?= $form->field($model, 'ho_ten') ?>

    <?= $form->field($model, 'ngay_sinh') ?>

    <?= $form->field($model, 'gioi_tinh') ?>

    <?php // echo $form->field($model, 'cccd') ?>

    <?php // echo $form->field($model, 'trang_thai') ?>

    <?php // echo $form->field($model, 'ngay_bat_dau_thue') ?>

    <?php // echo $form->field($model, 'ngay_ngung_thue') ?>

    <?php // echo $form->field($model, 'ghi_chu') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'user_created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
