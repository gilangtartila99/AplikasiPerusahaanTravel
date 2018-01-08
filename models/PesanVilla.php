<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesan_villa".
 *
 * @property integer $id_pesan_villa
 * @property string $tanggal_pesan
 * @property string $tanggal_mulai
 * @property integer $jumlah_hari
 * @property string $tanggal_akhir
 * @property integer $villa_id
 * @property string $nama
 * @property string $no_identitas
 * @property string $jenis_kelamin
 * @property string $alamat
 *
 * @property Villa $villa
 */
class PesanVilla extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesan_villa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_pesan', 'tanggal_mulai', 'jumlah_hari', 'tanggal_akhir', 'villa_id', 'nama', 'no_identitas', 'jenis_kelamin', 'alamat'], 'required'],
            [['tanggal_pesan', 'tanggal_mulai', 'tanggal_akhir'], 'safe'],
            [['jumlah_hari', 'villa_id'], 'integer'],
            [['nama', 'no_identitas'], 'string', 'max' => 255],
            [['jenis_kelamin'], 'string', 'max' => 30],
            [['alamat'], 'string', 'max' => 500],
            [['villa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Villa::className(), 'targetAttribute' => ['villa_id' => 'id_villa']],

            [['tanggal_pesan'], 'unique', 'message' => Yii::$app->session->getFlash('danger','Maaf tanggal ini telah dipesan!')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pesan_villa' => 'Id Pesan Villa',
            'tanggal_pesan' => 'Tanggal Pesan',
            'tanggal_mulai' => 'Tanggal Mulai',
            'jumlah_hari' => 'Jumlah Hari',
            'tanggal_akhir' => 'Tanggal Akhir',
            'villa_id' => 'Villa ID',
            'nama' => 'Nama',
            'no_identitas' => 'No Identitas',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVilla()
    {
        return $this->hasOne(Villa::className(), ['id_villa' => 'villa_id']);
    }
}
