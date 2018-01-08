<?php

mysql_connect('localhost','root','');
mysql_select_db('travel');

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=travel',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
