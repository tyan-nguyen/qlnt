<?php

namespace app\modules\quanly\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\quanly\models\NguoiThue;

/**
 * NguoiThueSearch represents the model behind the search form about `app\modules\quanly\models\NguoiThue`.
 */
class NguoiThueSearch extends NguoiThue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_phong', 'user_created'], 'integer'],
            [['ho_ten', 'ngay_sinh', 'gioi_tinh', 'cccd', 'trang_thai', 'ngay_bat_dau_thue', 
                'ngay_ngung_thue', 'ghi_chu', 'date_created', 'idDay'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = NguoiThue::find()->alias('t');
        $query->joinWith('phong as p');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => ['id' => SORT_DESC]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            't.id' => $this->id,
            't.id_phong' => $this->id_phong,
            't.ngay_bat_dau_thue' => $this->ngay_bat_dau_thue,
            't.ngay_ngung_thue' => $this->ngay_ngung_thue,
            't.date_created' => $this->date_created,
            't.user_created' => $this->user_created,
            'p.id_day' => $this->idDay
        ]);

        $query->andFilterWhere(['like', 't.ho_ten', $this->ho_ten])
            ->andFilterWhere(['like', 't.ngay_sinh', $this->ngay_sinh])
            ->andFilterWhere(['like', 't.gioi_tinh', $this->gioi_tinh])
            ->andFilterWhere(['like', 't.cccd', $this->cccd])
            ->andFilterWhere(['like', 't.trang_thai', $this->trang_thai])
            ->andFilterWhere(['like', 't.ghi_chu', $this->ghi_chu]);

        return $dataProvider;
    }
}
