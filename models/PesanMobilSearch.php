<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PesanMobil;

/**
 * PesanMobilSearch represents the model behind the search form about `app\models\PesanMobil`.
 */
class PesanMobilSearch extends PesanMobil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pesan_mobil', 'jumlah_hari', 'mobil_id'], 'integer'],
            [['tanggal_pesan', 'tanggal_mulai', 'tanggal_akhir', 'nama', 'no_identitas', 'jenis_kelamin', 'alamat','supir'], 'safe'],
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
        $query = PesanMobil::find();

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
            'id_pesan_mobil' => $this->id_pesan_mobil,
            'tanggal_pesan' => $this->tanggal_pesan,
            'tanggal_mulai' => $this->tanggal_mulai,
            'jumlah_hari' => $this->jumlah_hari,
            'tanggal_akhir' => $this->tanggal_akhir,
            'mobil_id' => $this->mobil_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'no_identitas', $this->no_identitas])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'supir', $this->supir])
            ->andFilterWhere(['like', 'alamat', $this->alamat]);

        return $dataProvider;
    }
}
