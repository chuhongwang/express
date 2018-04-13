<?php

return [
    //106.15.74.147 6379 密码：hsajlkfjdskjfvkfds
    'components' => [
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '106.15.74.147',
            'port' => 6379,
            'password' => 'hsajlkfjdskjfvkfds',

        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=express_manage',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => true,
        ],
    ],
];