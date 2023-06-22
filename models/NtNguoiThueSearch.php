<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NtNguoiThue;

/**
 * NtNguoiThueSearch represents the model behind the search form of `app\models\NtNguoiThue`.
 */
class NtNguoiThueSearch extends NtNguoiThue
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_phong', 'gioi_tinh', 'trang_thai', 'user_created'], 'integer'],
            [['ho_ten', 'ngay_sinh', 'cccd', 'ngay_bat_dau_thue', 'ngay_ngung_thue', 'ghi_chu', 'date_created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = NtNguoiThue::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_phong' => $this->id_phong,
            'gioi_tinh' => $this->gioi_tinh,
            'trang_thai' => $this->trang_thai,
            'ngay_bat_dau_thue' => $this->ngay_bat_dau_thue,
            'ngay_ngung_thue' => $this->ngay_ngung_thue,
            'ghi_chu' => $this->ghi_chu,
            'date_created' => $this->date_created,
            'user_created' => $this->user_created,
        ]);

        $query->andFilterWhere(['like', 'ho_ten', $this->ho_ten])
            ->andFilterWhere(['like', 'ngay_sinh', $this->ngay_sinh])
            ->andFilterWhere(['like', 'cccd', $this->cccd]);

        return $dataProvider;
    }
}
