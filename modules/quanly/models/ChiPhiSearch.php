<?php

namespace app\modules\quanly\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\quanly\models\ChiPhi;

/**
 * ChiPhiSearch represents the model behind the search form about `app\modules\quanly\models\ChiPhi`.
 */
class ChiPhiSearch extends ChiPhi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_created'], 'integer'],
            [['ten_chi_phi', 'don_vi_tinh', 'ghi_chu', 'is_hidden', 'is_blocked', 'date_created'], 'safe'],
            [['don_gia'], 'number'],
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
        $query = ChiPhi::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'don_gia' => $this->don_gia,
            'date_created' => $this->date_created,
            'user_created' => $this->user_created,
        ]);

        $query->andFilterWhere(['like', 'ten_chi_phi', $this->ten_chi_phi])
            ->andFilterWhere(['like', 'don_vi_tinh', $this->don_vi_tinh])
            ->andFilterWhere(['like', 'ghi_chu', $this->ghi_chu])
            ->andFilterWhere(['like', 'is_hidden', $this->is_hidden])
            ->andFilterWhere(['like', 'is_blocked', $this->is_blocked]);

        return $dataProvider;
    }
}
