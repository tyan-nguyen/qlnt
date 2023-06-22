<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NtHoaDonChiTiet $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nt-hoa-don-chi-tiet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_hoa_don')->textInput() ?>

    <?= $form->field($model, 'id_chi_phi')->textInput() ?>

    <?= $form->field($model, 'so_luong')->textInput() ?>

    <?= $form->field($model, 'don_gia')->textInput() ?>

    <?= $form->field($model, 'thanh_tien')->textInput() ?>

    <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'user_created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
