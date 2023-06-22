<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nt_phong".
 *
 * @property int $id
 * @property int $id_day
 * @property string $ten_phong
 * @property float $don_gia
 * @property string|null $ghi_chu
 * @property string|null $date_created
 * @property int|null $user_created
 *
 * @property NtDay $day
 * @property NtHoaDon[] $ntHoaDons
 * @property NtNguoiThue[] $ntNguoiThues
 */
class NtPhong extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nt_phong';
    }

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
            [['id_day'], 'exist', 'skipOnError' => true, 'targetClass' => NtDay::class, 'targetAttribute' => ['id_day' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_day' => 'Id Day',
            'ten_phong' => 'Ten Phong',
            'don_gia' => 'Don Gia',
            'ghi_chu' => 'Ghi Chu',
            'date_created' => 'Date Created',
            'user_created' => 'User Created',
        ];
    }

    /**
     * Gets query for [[Day]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDay()
    {
        return $this->hasOne(NtDay::class, ['id' => 'id_day']);
    }

    /**
     * Gets query for [[NtHoaDons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNtHoaDons()
    {
        return $this->hasMany(NtHoaDon::class, ['id_phong' => 'id']);
    }

    /**
     * Gets query for [[NtNguoiThues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNtNguoiThues()
    {
        return $this->hasMany(NtNguoiThue::class, ['id_phong' => 'id']);
    }
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->date_created = date('Y-m-d H:i:s');
            $this->user_created = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
}
