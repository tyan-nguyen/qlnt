<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NtHoaDon $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nt-hoa-don-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_phong')->textInput() ?>

    <?= $form->field($model, 'thang')->textInput() ?>

    <?= $form->field($model, 'nam')->textInput() ?>

    <?= $form->field($model, 'so_dien_truoc')->textInput() ?>

    <?= $form->field($model, 'so_dien_sau')->textInput() ?>

    <?= $form->field($model, 'so_nuoc_truoc')->textInput() ?>

    <?= $form->field($model, 'so_nuoc_sau')->textInput() ?>

    <?= $form->field($model, 'ngay_ghi_dien_nuoc')->textInput() ?>

    <?= $form->field($model, 'tong_tien')->textInput() ?>

    <?= $form->field($model, 'da_thanh_toan')->textInput() ?>

    <?= $form->field($model, 'ngay_thanh_toan')->textInput() ?>

    <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'user_created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
