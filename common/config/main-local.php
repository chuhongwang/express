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
            'dsn' => 'mysql:host=47.94.146.53;dbname=express_manage',
            'username' => 'root',
            'password' => '3b508c731665dfae',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => true,
        ],
    ],
];