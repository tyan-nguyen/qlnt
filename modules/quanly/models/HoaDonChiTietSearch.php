<?php

namespace app\modules\quanly\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\quanly\models\HoaDonChiTiet;

/**
 * HoaDonChiTietSearch represents the model behind the search form about `app\modules\quanly\models\HoaDonChiTiet`.
 */
class HoaDonChiTietSearch extends HoaDonChiTiet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_hoa_don', 'id_chi_phi', 'user_created'], 'integer'],
            [['so_luong', 'don_gia', 'thanh_tien'], 'number'],
            [['ghi_chu', 'date_created'], 'safe'],
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
        $query = HoaDonChiTiet::find();

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
            'id_hoa_don' => $this->id_hoa_don,
            'id_chi_phi' => $this->id_chi_phi,
            'so_luong' => $this->so_luong,
            'don_gia' => $this->don_gia,
            'thanh_tien' => $this->thanh_tien,
            'date_created' => $this->date_created,
            'user_created' => $this->user_created,
        ]);

        $query->andFilterWhere(['like', 'ghi_chu', $this->ghi_chu]);

        return $dataProvider;
    }
}
