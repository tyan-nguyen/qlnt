<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\HoaDonChiTiet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hoa-don-chi-tiet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_hoa_don')->textInput() ?>

    <?= $form->field($model, 'id_chi_phi')->textInput() ?>

    <?= $form->field($model, 'so_luong')->textInput() ?>

    <?= $form->field($model, 'don_gia')->textInput() ?>

    <?= $form->field($model, 'thanh_tien')->textInput() ?>

    <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'user_created')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
