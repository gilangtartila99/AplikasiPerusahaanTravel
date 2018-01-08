<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Villa;

/**
 * VillaSearch represents the model behind the search form about `app\models\Villa`.
 */
class VillaIndexSearch extends Villa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_villa', 'harga'], 'integer'],
            [['tipe_villa', 'nama_villa', 'keterangan', 'gambar'], 'safe'],
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
        $query = Villa::find()->limit(3);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            'sort'=> ['defaultOrder' => ['id_villa'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_villa' => $this->id_villa,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'tipe_villa', $this->tipe_villa])
            ->andFilterWhere(['like', 'nama_villa', $this->nama_villa])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'gambar', $this->gambar]);

        return $dataProvider;
    }
}
