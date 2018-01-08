<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mobil;

/**
 * MobilSearch represents the model behind the search form about `app\models\Mobil`.
 */
class MobilSearch extends Mobil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mobil', 'harga'], 'integer'],
            [['plat_nomor', 'tipe_mobil', 'pabrikan_mobil', 'jenis_mobil', 'keterangan', 'gambar'], 'safe'],
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
        $query = Mobil::find();

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
            'id_mobil' => $this->id_mobil,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'plat_nomor', $this->plat_nomor])
            ->andFilterWhere(['like', 'tipe_mobil', $this->tipe_mobil])
            ->andFilterWhere(['like', 'pabrikan_mobil', $this->pabrikan_mobil])
            ->andFilterWhere(['like', 'jenis_mobil', $this->jenis_mobil])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'gambar', $this->gambar]);

        return $dataProvider;
    }
}
