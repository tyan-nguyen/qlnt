<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nt_day".
 *
 * @property int $id
 * @property string $ten_day
 * @property string|null $ghi_chu
 * @property string|null $date_created
 * @property int|null $user_created
 *
 * @property NtPhong[] $ntPhongs
 */
class NtDay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nt_day';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_day'], 'required'],
            [['ghi_chu'], 'string'],
            [['date_created'], 'safe'],
            [['user_created'], 'integer'],
            [['ten_day'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_day' => 'Ten Day',
            'ghi_chu' => 'Ghi Chu',
            'date_created' => 'Date Created',
            'user_created' => 'User Created',
        ];
    }

    /**
     * Gets query for [[NtPhongs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNtPhongs()
    {
        return $this->hasMany(NtPhong::class, ['id_day' => 'id']);
    }
    
    public function beforeSave($insert) {        
        if ($this->isNewRecord) {
            $this->date_created = date('Y-m-d H:i:s');
            $this->user_created = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
        }        
        return parent::beforeSave($insert);
    }
}
