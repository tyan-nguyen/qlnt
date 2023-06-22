<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NtNguoiThue $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nt-nguoi-thue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_phong')->textInput() ?>

    <?= $form->field($model, 'ho_ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_sinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gioi_tinh')->textInput() ?>

    <?= $form->field($model, 'cccd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trang_thai')->textInput() ?>

    <?= $form->field($model, 'ngay_bat_dau_thue')->textInput() ?>

    <?= $form->field($model, 'ngay_ngung_thue')->textInput() ?>

    <?= $form->field($model, 'ghi_chu')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'user_created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
