<?php

namespace app\models;

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
class NtChiPhi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nt_chi_phi';
    }

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
            'ten_chi_phi' => 'Ten Chi Phi',
            'don_vi_tinh' => 'Don Vi Tinh',
            'don_gia' => 'Don Gia',
            'ghi_chu' => 'Ghi Chu',
            'is_hidden' => 'Is Hidden',
            'is_blocked' => 'Is Blocked',
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
        return $this->hasMany(NtHoaDonChiTiet::class, ['id_chi_phi' => 'id']);
    }
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->date_created = date('Y-m-d H:i:s');
            $this->user_created = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
}
