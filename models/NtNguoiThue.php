<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nt_nguoi_thue".
 *
 * @property int $id
 * @property int $id_phong
 * @property string $ho_ten
 * @property string|null $ngay_sinh
 * @property int|null $gioi_tinh
 * @property string|null $cccd
 * @property int|null $trang_thai
 * @property string|null $ngay_bat_dau_thue
 * @property string|null $ngay_ngung_thue
 * @property string|null $ghi_chu
 * @property string|null $date_created
 * @property int|null $user_created
 *
 * @property NtPhong $phong
 */
class NtNguoiThue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nt_nguoi_thue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_phong', 'ho_ten'], 'required'],
            [['id_phong', 'gioi_tinh', 'trang_thai', 'user_created'], 'integer'],
            [['ngay_bat_dau_thue', 'ngay_ngung_thue', 'ghi_chu', 'date_created'], 'safe'],
            [['ho_ten'], 'string', 'max' => 100],
            [['ngay_sinh'], 'string', 'max' => 10],
            [['cccd'], 'string', 'max' => 20],
            [['id_phong'], 'exist', 'skipOnError' => true, 'targetClass' => NtPhong::class, 'targetAttribute' => ['id_phong' => 'id']],
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
            'ho_ten' => 'Ho Ten',
            'ngay_sinh' => 'Ngay Sinh',
            'gioi_tinh' => 'Gioi Tinh',
            'cccd' => 'Cccd',
            'trang_thai' => 'Trang Thai',
            'ngay_bat_dau_thue' => 'Ngay Bat Dau Thue',
            'ngay_ngung_thue' => 'Ngay Ngung Thue',
            'ghi_chu' => 'Ghi Chu',
            'date_created' => 'Date Created',
            'user_created' => 'User Created',
        ];
    }

    /**
     * Gets query for [[Phong]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhong()
    {
        return $this->hasOne(NtPhong::class, ['id' => 'id_phong']);
    }
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->date_created = date('Y-m-d H:i:s');
            $this->user_created = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
}
