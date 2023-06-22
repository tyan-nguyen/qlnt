<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NtChiPhi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nt-chi-phi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_chi_phi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'don_vi_tinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'don_gia')->textInput() ?>

    <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_hidden')->textInput() ?>

    <?= $form->field($model, 'is_blocked')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'user_created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
