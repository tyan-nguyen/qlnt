<?php

namespace app\modules\quanly\models;

use Yii;

class NguoiThue extends \app\models\NtNguoiThue
{
    public $idDay;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDay','id_phong', 'ho_ten', 'trang_thai', 'gioi_tinh'], 'required'],
            [['id_phong', 'gioi_tinh', 'trang_thai', 'user_created', 'idDay'], 'integer'],
            [['ngay_bat_dau_thue', 'ngay_ngung_thue', 'ghi_chu', 'date_created'], 'safe'],
            [['ho_ten'], 'string', 'max' => 100],
            [['ngay_sinh'], 'string', 'max' => 10],
            [['cccd'], 'string', 'max' => 20],
            [['id_phong'], 'exist', 'skipOnError' => true, 'targetClass' => Phong::class, 'targetAttribute' => ['id_phong' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idDay' => 'Thuộc dãy',
            'id_phong' => 'Thuộc phòng',
            'ho_ten' => 'Họ tên',
            'ngay_sinh' => 'Ngày sinh',
            'gioi_tinh' => 'Giới tính',
            'cccd' => 'Căn cước công dân',
            'trang_thai' => 'Trạng thái',
            'ngay_bat_dau_thue' => 'Ngày bắt đầu thuê',
            'ngay_ngung_thue' => 'Ngày ngưng thuê',
            'ghi_chu' => 'Ghi chú',
            'date_created' => 'Ngày giờ tạo',
            'user_created' => 'Người tạo',
        ];
    }

    /**
     * Gets query for [[Phong]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhong()
    {
        return $this->hasOne(Phong::class, ['id' => 'id_phong']);
    }
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->date_created = date('Y-m-d H:i:s');
            $this->user_created = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
            if($this->trang_thai == null)
                $this->trang_thai = 0;
        }
        $cus = new CFunc();
        if($this->ngay_bat_dau_thue != null)
            $this->ngay_bat_dau_thue = $cus->convertDMYToYMD($this->ngay_bat_dau_thue);
        if($this->ngay_ngung_thue != null)
            $this->ngay_ngung_thue = $cus->convertDMYToYMD($this->ngay_ngung_thue);
        return parent::beforeSave($insert);
    }
    
    public function getShowNgayBatDauThue(){
        $cus = new CFunc();
        return $this->ngay_bat_dau_thue!=null?$cus->convertYMDToDMY($this->ngay_bat_dau_thue):'';
    }
    
    public function getShowNgayNgungThue(){
        $cus = new CFunc();
        return $this->ngay_ngung_thue!=null?$cus->convertYMDToDMY($this->ngay_ngung_thue):'';
    }
}
