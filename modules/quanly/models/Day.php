<?php

namespace app\modules\quanly\models;

use Yii;
use yii\helpers\ArrayHelper;

class Day extends \app\models\NtDay
{
    
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
            'ten_day' => 'Tên dãy phòng',
            'ghi_chu' => 'Ghi chú',
            'date_created' => 'Ngày giờ tạo',
            'user_created' => 'Người tạo',
        ];
    }
    
    /**
     * Gets query for [[NtPhongs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNtPhongs()
    {
        return $this->hasMany(Phong::class, ['id_day' => 'id']);
    }
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->date_created = date('Y-m-d H:i:s');
            $this->user_created = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
    
    public static function getList(){
        $list = Day::find()->all();
        return ArrayHelper::map($list, 'id', 'ten_day');
    }
}
