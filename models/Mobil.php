<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mobil".
 *
 * @property integer $id_mobil
 * @property string $plat_nomor
 * @property string $tipe_mobil
 * @property string $pabrikan_mobil
 * @property string $jenis_mobil
 * @property string $keterangan
 * @property integer $harga
 * @property string $gambar
 *
 * @property Paket[] $pakets
 * @property PesanMobil[] $pesanMobils
 */
class Mobil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mobil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plat_nomor', 'tipe_mobil', 'pabrikan_mobil', 'jenis_mobil', 'keterangan', 'harga', 'gambar'], 'required'],
            [['harga'], 'integer'],
            [['plat_nomor', 'tipe_mobil', 'pabrikan_mobil', 'jenis_mobil'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 1500],
            [['gambar'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mobil' => 'Id Mobil',
            'plat_nomor' => 'Plat Nomor',
            'tipe_mobil' => 'Tipe Mobil',
            'pabrikan_mobil' => 'Pabrikan Mobil',
            'jenis_mobil' => 'Jenis Mobil',
            'keterangan' => 'Keterangan',
            'harga' => 'Harga',
            'gambar' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPakets()
    {
        return $this->hasMany(Paket::className(), ['mobil_id' => 'id_mobil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesanMobils()
    {
        return $this->hasMany(PesanMobil::className(), ['mobil_id' => 'id_mobil']);
    }
}
