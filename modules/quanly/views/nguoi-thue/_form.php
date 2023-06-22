<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use app\modules\quanly\models\Phong;
use kartik\date\DatePicker;
use app\modules\quanly\models\CFunc;
use kartik\select2\Select2;
use app\modules\quanly\models\Day;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\NguoiThue */
/* @var $form yii\widgets\ActiveForm */
$cus = new CFunc();
if($model->ngay_bat_dau_thue != null){
    $model->ngay_bat_dau_thue = $cus->convertYMDToDMY($model->ngay_bat_dau_thue);
}
if($model->ngay_ngung_thue != null){
    $model->ngay_ngung_thue = $cus->convertYMDToDMY($model->ngay_ngung_thue);
}

if(!$model->isNewRecord){
    $model->idDay = $model->phong->id_day;
}

$newArr = [];
if($model->isNewRecord){
    if($idPhong != null){
        $modelPhong = Phong::findOne($idPhong);
        if($modelPhong != null){            
            $model->idDay = $modelPhong->id_day;
            $model->id_phong = $modelPhong->id;
            $newArr = [$modelPhong->id => $modelPhong->ten_phong];
        }
    }
}
?>

<div class="nguoi-thue-form">

    <?php $form = ActiveForm::begin(); ?>
    
        <div class="row">
    	<div class="col">
    		 <?= $form->field($model, 'idDay')->dropDownList(Day::getList(), ['prompt'=>'-Chọn-', 'id'=>'id-day']) ?>
    	</div>
    	<div class="col">
    		 <?php // $form->field($model, 'id_phong')->dropDownList(Phong::getListWithParent(), ['prompt'=>'-Chọn-']) ?>
    		 
    		<?php 
        		// Child # 2
        		echo $form->field($model, 'id_phong')->widget(DepDrop::classname(), [
        		      'data' => !$model->isNewRecord ? [$model->id_phong => $model->phong->ten_phong] : $newArr, 
            		'pluginOptions'=>[
                		'depends'=>['id-day', 'id-phong'],
                		'initialize' => true,
                		'placeholder'=>'Chọn...',
                		'url'=>Url::to(['/quanly/nguoi-thue/get-phong'])
            		]
        		]);
    		?>
    	</div>
    	
    </div>
    
    <!-- <div class="row">
    	<div class="col">
    		 <?php // $form->field($model, 'id_phong')->dropDownList(Phong::getListWithParent(), ['prompt'=>'-Chọn-']) ?>
    		 
    		 <?php 
        		 echo $form->field($model, 'idDay')->widget(Select2::classname(), [
        		     'data' => Day::getList(),
        		     //'theme' => Select2::THEME_BOOTSTRAP,
        		     'options' => ['placeholder' => 'Chọn dãy...'],
        		     'pluginOptions' => [
        		         'allowClear' => true,
        		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
        		     ],
        		 ]);
    		 ?>
    	</div>
    	<div class="col">
    		 <?php // $form->field($model, 'id_phong')->dropDownList(Phong::getListWithParent(), ['prompt'=>'-Chọn-']) ?>
    		 
    		 <?php 
        		 echo $form->field($model, 'id_phong')->widget(Select2::classname(), [
        		     'data' => Phong::getListWithGroup(),
        		     //'theme' => Select2::THEME_BOOTSTRAP,
        		     'options' => ['placeholder' => 'Chọn phòng...'],
        		     'pluginOptions' => [
        		         'allowClear' => true,
        		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
        		     ],
        		 ]);
    		 ?>
    	</div>
    	
    </div>-->
    
    <div class="row">
    	<div class="col">
    		 <?= $form->field($model, 'ho_ten')->textInput(['maxlength' => true]) ?>
    	</div>
    	<div class="col">
    		<?= $form->field($model, 'ngay_sinh')->textInput(['maxlength' => true]) ?>
    	</div>
    	
    </div>
    
	<div class="row">
		<div class="col-md-3">
    		<?= $form->field($model, 'gioi_tinh')->dropDownList([0=>'Nam', 1=>'Nữ'], ['prompt'=>'-Chọn-']) ?>
    	</div>
    	<div class="col-md-3">
    		<?= $form->field($model, 'cccd')->textInput(['maxlength' => true])->label('CCCD') ?>
    	</div>
    	<div class="col-md-6">
    		<?php // $form->field($model, 'ngay_bat_dau_thue')->textInput() ?>
    		<?php echo $form->field($model, 'ngay_bat_dau_thue')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Chọn ngày...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd/mm/yyyy'
                ]
            ]);
    		?>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col">
    		<?= $form->field($model, 'trang_thai')->dropDownList([1=>'Đang thuê',0=>'Ngừng thuê'], ['prompt'=>'-Chọn-']) ?>
    	</div>
    	<div class="col">
    		<?php //$form->field($model, 'ngay_ngung_thue')->textInput() ?>
    		<?php echo $form->field($model, 'ngay_ngung_thue')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Chọn ngày...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd/mm/yyyy'
                ]
            ]);
    		?>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col">
    		<?= $form->field($model, 'ghi_chu')->textarea(['rows' => 6]) ?>
    	</div>
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
