<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $nama
 * @property string $no_identitas
 * @property string $jenis_kelamin
 * @property string $alamat
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken', 'nama', 'no_identitas', 'jenis_kelamin', 'alamat', 'role'], 'required'],
            [['username', 'password', 'authKey', 'accessToken', 'nama', 'no_identitas'], 'string', 'max' => 255],
            [['jenis_kelamin'], 'string', 'max' => 30],
            [['alamat'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'nama' => 'Nama',
            'no_identitas' => 'No Identitas',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'role' => 'Hak Akses',
        ];
    }
}
