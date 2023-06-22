<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NtPhong $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nt-phong-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_day')->textInput() ?>

    <?= $form->field($model, 'ten_phong')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'don_gia')->textInput() ?>

    <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'user_created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
