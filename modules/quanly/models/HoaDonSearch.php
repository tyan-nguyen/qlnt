<?php

namespace app\modules\quanly\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\quanly\models\HoaDon;

/**
 * HoaDonSearch represents the model behind the search form about `app\modules\quanly\models\HoaDon`.
 */
class HoaDonSearch extends HoaDon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_phong', 'thang', 'nam', 'user_created'], 'integer'],
            [['so_dien_truoc', 'so_dien_sau', 'so_nuoc_truoc', 'so_nuoc_sau', 'tong_tien'], 'number'],
            [['ngay_ghi_dien_nuoc', 'da_thanh_toan', 'ngay_thanh_toan', 'ghi_chu', 'date_created'], 'safe'],
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
        $query = HoaDon::find();

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
            'id_phong' => $this->id_phong,
            'thang' => $this->thang,
            'nam' => $this->nam,
            'so_dien_truoc' => $this->so_dien_truoc,
            'so_dien_sau' => $this->so_dien_sau,
            'so_nuoc_truoc' => $this->so_nuoc_truoc,
            'so_nuoc_sau' => $this->so_nuoc_sau,
            'ngay_ghi_dien_nuoc' => $this->ngay_ghi_dien_nuoc,
            'tong_tien' => $this->tong_tien,
            'ngay_thanh_toan' => $this->ngay_thanh_toan,
            'date_created' => $this->date_created,
            'user_created' => $this->user_created,
        ]);

        $query->andFilterWhere(['like', 'da_thanh_toan', $this->da_thanh_toan])
            ->andFilterWhere(['like', 'ghi_chu', $this->ghi_chu]);

        return $dataProvider;
    }
}
