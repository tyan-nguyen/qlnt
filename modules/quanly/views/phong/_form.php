<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use app\modules\quanly\models\Day;

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\Phong */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phong-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'id_day')->dropDownList(Day::getList(), ['prompt' => '-Chọn-']) ?>

    <?= $form->field($model, 'ten_phong')->textInput(['maxlength' => true]) ?>

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
