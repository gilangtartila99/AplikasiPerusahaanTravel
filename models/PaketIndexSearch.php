<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paket;

/**
 * PaketSearch represents the model behind the search form about `app\models\Paket`.
 */
class PaketIndexSearch extends Paket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_paket', 'villa_id', 'mobil_id', 'harga'], 'integer'],
            [['nama_paket', 'keterangan', 'gambar'], 'safe'],
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
        $query = Paket::find()->limit(3);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            'sort'=> ['defaultOrder' => ['id_paket'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_paket' => $this->id_paket,
            'villa_id' => $this->villa_id,
            'mobil_id' => $this->mobil_id,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'nama_paket', $this->nama_paket])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'gambar', $this->gambar]);

        return $dataProvider;
    }
}
