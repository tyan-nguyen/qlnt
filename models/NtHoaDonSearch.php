<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NtHoaDon;

/**
 * NtHoaDonSearch represents the model behind the search form of `app\models\NtHoaDon`.
 */
class NtHoaDonSearch extends NtHoaDon
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_phong', 'thang', 'nam', 'da_thanh_toan', 'user_created'], 'integer'],
            [['so_dien_truoc', 'so_dien_sau', 'so_nuoc_truoc', 'so_nuoc_sau', 'tong_tien'], 'number'],
            [['ngay_ghi_dien_nuoc', 'ngay_thanh_toan', 'ghi_chu', 'date_created'], 'safe'],
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
        $query = NtHoaDon::find();

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
            'thang' => $this->thang,
            'nam' => $this->nam,
            'so_dien_truoc' => $this->so_dien_truoc,
            'so_dien_sau' => $this->so_dien_sau,
            'so_nuoc_truoc' => $this->so_nuoc_truoc,
            'so_nuoc_sau' => $this->so_nuoc_sau,
            'ngay_ghi_dien_nuoc' => $this->ngay_ghi_dien_nuoc,
            'tong_tien' => $this->tong_tien,
            'da_thanh_toan' => $this->da_thanh_toan,
            'ngay_thanh_toan' => $this->ngay_thanh_toan,
            'date_created' => $this->date_created,
            'user_created' => $this->user_created,
        ]);

        $query->andFilterWhere(['like', 'ghi_chu', $this->ghi_chu]);

        return $dataProvider;
    }
}
