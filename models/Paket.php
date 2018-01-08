<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paket".
 *
 * @property integer $id_paket
 * @property integer $villa_id
 * @property integer $mobil_id
 * @property string $nama_paket
 * @property string $keterangan
 * @property integer $harga
 * @property string $gambar
 *
 * @property Villa $villa
 * @property Mobil $mobil
 * @property PesanPaket[] $pesanPakets
 */
class Paket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['villa_id', 'mobil_id', 'nama_paket', 'keterangan', 'harga', 'gambar'], 'required'],
            [['villa_id', 'mobil_id', 'harga'], 'integer'],
            [['nama_paket', 'gambar'], 'string', 'max' => 255],
            [['keterangan'], 'string', 'max' => 500],
            [['villa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Villa::className(), 'targetAttribute' => ['villa_id' => 'id_villa']],
            [['mobil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mobil::className(), 'targetAttribute' => ['mobil_id' => 'id_mobil']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_paket' => 'Id Paket',
            'villa_id' => 'Villa ID',
            'mobil_id' => 'Mobil ID',
            'nama_paket' => 'Nama Paket',
            'keterangan' => 'Keterangan',
            'harga' => 'Harga',
            'gambar' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVilla()
    {
        return $this->hasOne(Villa::className(), ['id_villa' => 'villa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMobil()
    {
        return $this->hasOne(Mobil::className(), ['id_mobil' => 'mobil_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesanPakets()
    {
        return $this->hasMany(PesanPaket::className(), ['paket_id' => 'id_paket']);
    }
}
