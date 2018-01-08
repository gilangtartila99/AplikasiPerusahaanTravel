<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesan_mobil".
 *
 * @property integer $id_pesan_mobil
 * @property string $tanggal_pesan
 * @property string $tanggal_mulai
 * @property integer $jumlah_hari
 * @property string $tanggal_akhir
 * @property integer $mobil_id
 * @property string $nama
 * @property string $no_identitas
 * @property string $jenis_kelamin
 * @property string $alamat
 *
 * @property Mobil $mobil
 */
class PesanMobil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesan_mobil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_pesan', 'tanggal_mulai', 'jumlah_hari', 'tanggal_akhir', 'mobil_id', 'nama', 'no_identitas', 'jenis_kelamin', 'alamat'], 'required'],
            [['tanggal_pesan', 'tanggal_mulai', 'tanggal_akhir','supir'], 'safe'],
            [['jumlah_hari', 'mobil_id'], 'integer'],
            [['nama', 'no_identitas'], 'string', 'max' => 255],
            [['jenis_kelamin'], 'string', 'max' => 30],
            [['alamat'], 'string', 'max' => 500],
            [['mobil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mobil::className(), 'targetAttribute' => ['mobil_id' => 'id_mobil']],

            [['tanggal_pesan'], 'unique', 'message' => Yii::$app->session->getFlash('danger','Maaf tanggal ini telah dipesan!')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pesan_mobil' => 'Id Pesan Mobil',
            'tanggal_pesan' => 'Tanggal Pesan',
            'tanggal_mulai' => 'Tanggal Mulai',
            'jumlah_hari' => 'Jumlah Hari',
            'tanggal_akhir' => 'Tanggal Akhir',
            'mobil_id' => 'Mobil ID',
            'nama' => 'Nama',
            'no_identitas' => 'No Identitas',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'supir' => 'Supir',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMobil()
    {
        return $this->hasOne(Mobil::className(), ['id_mobil' => 'mobil_id']);
    }
}
