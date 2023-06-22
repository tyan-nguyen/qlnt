<?php

namespace app\modules\quanly\models;

use Yii;

class HoaDonChiTiet extends \app\models\NtHoaDonChiTiet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hoa_don', 'id_chi_phi'], 'required'],
            [['id_hoa_don', 'id_chi_phi', 'user_created'], 'integer'],
            [['so_luong', 'don_gia', 'thanh_tien'], 'number'],
            [['ghi_chu'], 'string'],
            [['date_created'], 'safe'],
            [['id_hoa_don'], 'exist', 'skipOnError' => true, 'targetClass' => HoaDon::class, 'targetAttribute' => ['id_hoa_don' => 'id']],
            [['id_chi_phi'], 'exist', 'skipOnError' => true, 'targetClass' => ChiPhi::class, 'targetAttribute' => ['id_chi_phi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hoa_don' => 'Id Hoa Don',
            'id_chi_phi' => 'Id Chi Phi',
            'so_luong' => 'So Luong',
            'don_gia' => 'Don Gia',
            'thanh_tien' => 'Thanh Tien',
            'ghi_chu' => 'Ghi Chu',
            'date_created' => 'Date Created',
            'user_created' => 'User Created',
        ];
    }

    /**
     * Gets query for [[ChiPhi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChiPhi()
    {
        return $this->hasOne(ChiPhi::class, ['id' => 'id_chi_phi']);
    }

    /**
     * Gets query for [[HoaDon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHoaDon()
    {
        return $this->hasOne(HoaDon::class, ['id' => 'id_hoa_don']);
    }
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->date_created = date('Y-m-d H:i:s');
            $this->user_created = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
}
