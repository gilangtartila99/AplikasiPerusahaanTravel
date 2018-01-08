<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesan_paket".
 *
 * @property integer $id_pesan_paket
 * @property string $tanggal_pesan
 * @property string $tanggal_mulai
 * @property integer $jumlah_hari
 * @property string $tanggal_akhir
 * @property integer $paket_id
 * @property string $nama
 * @property string $no_identitas
 * @property string $jenis_kelamin
 * @property string $alamat
 *
 * @property Paket $paket
 */
class PesanPaket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesan_paket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_pesan', 'tanggal_mulai', 'jumlah_hari', 'tanggal_akhir', 'paket_id', 'nama', 'no_identitas', 'jenis_kelamin', 'alamat'], 'required'],
            [['tanggal_pesan', 'tanggal_mulai', 'tanggal_akhir', 'fasilitas'], 'safe'],
            [['jumlah_hari', 'paket_id'], 'integer'],
            [['nama', 'no_identitas', 'alamat'], 'string', 'max' => 255],
            [['jenis_kelamin'], 'string', 'max' => 30],
            [['paket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paket::className(), 'targetAttribute' => ['paket_id' => 'id_paket']],

            [['tanggal_pesan'], 'unique', 'message' => Yii::$app->session->getFlash('danger','Maaf tanggal ini telah dipesan!')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pesan_paket' => 'Id Pesan Paket',
            'tanggal_pesan' => 'Tanggal Pesan',
            'tanggal_mulai' => 'Tanggal Mulai',
            'jumlah_hari' => 'Jumlah Hari',
            'tanggal_akhir' => 'Tanggal Akhir',
            'paket_id' => 'Paket ID',
            'nama' => 'Nama',
            'no_identitas' => 'No Identitas',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'fasilitas' => 'Fasilitas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaket()
    {
        return $this->hasOne(Paket::className(), ['id_paket' => 'paket_id']);
    }
}
