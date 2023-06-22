<?php

namespace app\modules\quanly\models;

use Yii;

class HoaDon extends \app\models\NtHoaDon
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_phong', 'thang', 'nam'], 'required'],
            [['id_phong', 'thang', 'nam', 'da_thanh_toan', 'user_created'], 'integer'],
            [['so_dien_truoc', 'so_dien_sau', 'so_nuoc_truoc', 'so_nuoc_sau', 'tong_tien'], 'number'],
            [['ngay_ghi_dien_nuoc', 'ngay_thanh_toan', 'date_created'], 'safe'],
            [['ghi_chu'], 'string'],
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
            'id_phong' => 'Id Phong',
            'thang' => 'Thang',
            'nam' => 'Nam',
            'so_dien_truoc' => 'So Dien Truoc',
            'so_dien_sau' => 'So Dien Sau',
            'so_nuoc_truoc' => 'So Nuoc Truoc',
            'so_nuoc_sau' => 'So Nuoc Sau',
            'ngay_ghi_dien_nuoc' => 'Ngay Ghi Dien Nuoc',
            'tong_tien' => 'Tong Tien',
            'da_thanh_toan' => 'Da Thanh Toan',
            'ngay_thanh_toan' => 'Ngay Thanh Toan',
            'ghi_chu' => 'Ghi Chu',
            'date_created' => 'Date Created',
            'user_created' => 'User Created',
        ];
    }

    /**
     * Gets query for [[NtHoaDonChiTiets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNtHoaDonChiTiets()
    {
        return $this->hasMany(HoaDonChiTiet::class, ['id_hoa_don' => 'id']);
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
        }
        return parent::beforeSave($insert);
    }
}
