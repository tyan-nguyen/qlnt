<?php

namespace app\modules\quanly\models;

use Yii;
use yii\helpers\ArrayHelper;

class Phong extends \app\models\NtPhong
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_day', 'ten_phong', 'don_gia'], 'required'],
            [['id_day', 'user_created'], 'integer'],
            [['don_gia'], 'number'],
            [['ghi_chu'], 'string'],
            [['date_created'], 'safe'],
            [['ten_phong'], 'string', 'max' => 200],
            [['id_day'], 'exist', 'skipOnError' => true, 'targetClass' => Day::class, 'targetAttribute' => ['id_day' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_day' => 'Thuộc dãy',
            'ten_phong' => 'Tên phòng',
            'don_gia' => 'Đơn giá',
            'ghi_chu' => 'Ghi chú',
            'date_created' => 'Ngày giờ tạo',
            'user_created' => 'Người tạo',
        ];
    }
    
    /**
     * show don gia format
     */
    public function getShowDonGia(){
        $cus = new CFunc();
        if($cus->is_decimal($this->don_gia))
            return number_format($this->don_gia, 2) . ' đ';
        else 
            return number_format($this->don_gia) .' đ';
    }
    
    /**
     * show don gia bang chu
     */
    public function getShowDonGiaBangChu(){
        $cus = new CFunc();
        return $cus->convert_number_to_words($this->don_gia) . ' đồng';
    }

    /**
     * Gets query for [[Day]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDay()
    {
        return $this->hasOne(Day::class, ['id' => 'id_day']);
    }

    /**
     * Gets query for [[NtHoaDons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNtHoaDons()
    {
        return $this->hasMany(HoaDon::class, ['id_phong' => 'id']);
    }

    /**
     * Gets query for [[NtNguoiThues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNtNguoiThues()
    {
        return $this->hasMany(NguoiThue::class, ['id_phong' => 'id']);
    }
    
    public function getTrangThaiPhong(){
        $nguoiThue = NguoiThue::find()->where([
            'id_phong'=>$this->id,
            'trang_thai'=>1,//1 is true: dang thue
        ])->one();
        if($nguoiThue != null)
            return true;
        else 
            return false;
    }
    
    public function getShowNguoiThue(){
        $nguoiThue = NguoiThue::find()->where([
            'id_phong'=>$this->id,
            'trang_thai'=>1,//1 is true: dang thue
        ])->one();
        if($nguoiThue != null)
            return $nguoiThue->ho_ten;
        else
           return '';
    }
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->date_created = date('Y-m-d H:i:s');
            $this->user_created = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
    
    public function getPhongWithParent(){
        return $this->ten_phong . ' (' . $this->day->ten_day . ')';
    }
    
    public static function getListWithParent(){
        $list = Phong::find()->all();
        return ArrayHelper::map($list, 'id', 'phongWithParent');
    }
    
    public static function getListWithGroup(){
        $list = Phong::find()->all();
        return ArrayHelper::map($list, 'id', 'ten_phong', 'day.ten_day');
    }
    
    public static function getListWithParentID($pid){
        $list = null;
        if($pid != null){
            $list = Phong::find()->where(['id_day'=>$pid])->all();
        } else {
            $list = Phong::find()->all();
        }
        return ArrayHelper::map($list, 'id', 'ten_phong', 'day.ten_day');
    }
    
    public static function getListWithPID($pid){
        $listRs = array();
        if($pid != null){
            $list = Phong::find()->select(['id', 'ten_phong'])->where(['id_day'=>$pid])->all();
            foreach ($list as $indexPhong =>$phong){
                $listRs[] = ['id'=>$phong->id, 'name'=>$phong->ten_phong];
            }
        }
        return $listRs;
    }
}
