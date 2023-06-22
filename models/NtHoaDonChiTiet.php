<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nt_hoa_don_chi_tiet".
 *
 * @property int $id
 * @property int $id_hoa_don
 * @property int $id_chi_phi
 * @property float|null $so_luong
 * @property float|null $don_gia
 * @property float|null $thanh_tien
 * @property string|null $ghi_chu
 * @property string|null $date_created
 * @property int|null $user_created
 *
 * @property NtChiPhi $chiPhi
 * @property NtHoaDon $hoaDon
 */
class NtHoaDonChiTiet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nt_hoa_don_chi_tiet';
    }

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
            [['id_hoa_don'], 'exist', 'skipOnError' => true, 'targetClass' => NtHoaDon::class, 'targetAttribute' => ['id_hoa_don' => 'id']],
            [['id_chi_phi'], 'exist', 'skipOnError' => true, 'targetClass' => NtChiPhi::class, 'targetAttribute' => ['id_chi_phi' => 'id']],
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
        return $this->hasOne(NtChiPhi::class, ['id' => 'id_chi_phi']);
    }

    /**
     * Gets query for [[HoaDon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHoaDon()
    {
        return $this->hasOne(NtHoaDon::class, ['id' => 'id_hoa_don']);
    }
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->date_created = date('Y-m-d H:i:s');
            $this->user_created = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
}
