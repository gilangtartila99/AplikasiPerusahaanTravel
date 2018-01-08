<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "villa".
 *
 * @property integer $id_villa
 * @property string $tipe_villa
 * @property string $nama_villa
 * @property string $keterangan
 * @property integer $harga
 * @property string $gambar
 *
 * @property Paket[] $pakets
 * @property PesanVilla[] $pesanVillas
 */
class Villa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'villa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipe_villa', 'nama_villa', 'keterangan', 'harga', 'gambar'], 'required'],
            [['harga'], 'integer'],
            [['tipe_villa', 'nama_villa'], 'string', 'max' => 100],
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
            'id_villa' => 'Id Villa',
            'tipe_villa' => 'Tipe Villa',
            'nama_villa' => 'Nama Villa',
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
        return $this->hasMany(Paket::className(), ['villa_id' => 'id_villa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesanVillas()
    {
        return $this->hasMany(PesanVilla::className(), ['villa_id' => 'id_villa']);
    }
}
