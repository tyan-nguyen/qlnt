<?php

namespace app\modules\quanly\models;

use Yii;

/**
 * This is the model class for table "nt_chi_phi".
 *
 * @property int $id
 * @property string $ten_chi_phi
 * @property string $don_vi_tinh
 * @property float $don_gia
 * @property string|null $ghi_chu
 * @property int|null $is_hidden
 * @property int|null $is_blocked
 * @property string|null $date_created
 * @property int|null $user_created
 *
 * @property NtHoaDonChiTiet[] $ntHoaDonChiTiets
 */
class ChiPhi extends \app\models\NtChiPhi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_chi_phi', 'don_vi_tinh', 'don_gia'], 'required'],
            [['don_gia'], 'number'],
            [['ghi_chu'], 'string'],
            [['is_hidden', 'is_blocked', 'user_created'], 'integer'],
            [['date_created'], 'safe'],
            [['ten_chi_phi'], 'string', 'max' => 200],
            [['don_vi_tinh'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_chi_phi' => 'Tên chi phí',
            'don_vi_tinh' => 'Đơn vị tính',
            'don_gia' => 'Đơn giá',
            'ghi_chu' => 'Ghi chú',
            'is_hidden' => 'Ẩn',
            'is_blocked' => 'Khóa',
            'date_created' => 'Ngày giờ tạo',
            'user_created' => 'Người tạo',
        ];
    }

    /**
     * Gets query for [[NtHoaDonChiTiets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNtHoaDonChiTiets()
    {
        return $this->hasMany(HoaDonChiTiet::class, ['id_chi_phi' => 'id']);
    }
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            if($this->is_hidden == null)
                $this->is_hidden = 0;
            if($this->is_blocked == null)
                $this->is_blocked = 0;
            $this->date_created = date('Y-m-d H:i:s');
            $this->user_created = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
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
}
