<?php
use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use kartik\grid\GridView;
use cangak\ajaxcrud\CrudAsset; 
use cangak\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\quanly\models\Day2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dãy phòng';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="day-index">
    <div id="ajaxCrudDatatable">
    
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="fas fa fa-plus" aria-hidden="true"></i> Thêm mới', ['create'],
                        ['role'=>'modal-remote','title'=> 'Thêm mới một dãy phòng','class'=>'btn btn-outline-primary']).
                    Html::a('<i class="fas fa fa-sync" aria-hidden="true"></i> Tải lại', [''],
                        ['data-pjax'=>1, 'class'=>'btn btn-outline-primary', 'title'=>'Tải lại']).
                    //'{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                //'type' => 'primary', 
                'heading' => '<i class="fas fa fa-list" aria-hidden="true"></i> Danh sách',
                'before'=>'<em>* Danh sách dãy phòng.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="fas fa fa-trash" aria-hidden="true"></i>&nbsp; Xóa đã chọn',
                                ["bulkdelete"] ,
                                [
                                    "class"=>"btn btn-sm btn-outline-danger",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Xác nhận xóa?',
                                    'data-confirm-message'=>'Bạn có chắc muốn xóa?'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
   "options" => [
    "id"=>"ajaxCrudModal",
    "tabindex" => false // important for Select2 to work properly
],
   "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

<!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->

<div class="toast-container position-fixed top-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Thông báo</strong>
      <small>Vừa xong</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>

<!-- 
<script>
const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
  toastTrigger.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
  })
}
</script>
-->