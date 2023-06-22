<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\HoaDon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hoa-don-form">

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

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
