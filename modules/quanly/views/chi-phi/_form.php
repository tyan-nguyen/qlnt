<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\ChiPhi */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="chi-phi-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'ten_chi_phi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'don_vi_tinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'don_gia')->textInput(['id'=>'txtDonGia']) ?>
    
    <div>
    <p><span><strong>Giá trị nhập:</strong> </span>
    <span id="num"><?= !$model->isNewRecord?$model->showDonGia:'0 đ' ?></span>
    </p>
    <p><span><strong>Bằng chữ:</strong> </span>
    <span id="numletter"><?= !$model->isNewRecord?$model->showDonGiaBangChu:'Không đồng' ?></span>
    </p>
    </div>

    <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'is_hidden')->checkbox(['role'=>'switch']) ?>
    <div class="form-check form-switch">
      <input type="hidden" name="ChiPhi[is_hidden]" value="0">
      <input name="ChiPhi[is_hidden]" value="1" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" <?= $model->is_hidden ==1 ? 'checked' : '' ?>>
      <label class="form-check-label" for="flexSwitchCheckChecked"><?= $model->getAttributeLabel('is_hidden') ?></label>
    </div>

    <?php // $form->field($model, 'is_blocked')->textInput() ?>
    <div class="form-check form-switch">
      <input type="hidden" name="ChiPhi[is_blocked]" value="0">
      <input name="ChiPhi[is_blocked]" value="1" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" <?= $model->is_blocked ==1 ? 'checked' : '' ?>>
      <label class="form-check-label" for="flexSwitchCheckChecked"><?= $model->getAttributeLabel('is_blocked') ?></label>
    </div>
	
	<?php /* ?>
    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'user_created')->textInput() ?>
    <?php */ ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

<script>

$('#txtDonGia').on('keyup', function() {
	var tovn = to_vietnamese(this.value) + ' đồng';
    var nf = numberWithCommas($(this).val());
	$('#num').text(nf + ' đ');
	$('#numletter').text(tovn);
});

function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
</script>