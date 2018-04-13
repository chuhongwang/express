<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=ylb_ump_host;dbname=ylb_ump',
            'enableSchemaCache' => TRUE,
            'username' => 'ylb_ump_username',
            'password' => 'ylb_ump_password',
            'charset' => 'utf8',
        ],
        'ylb_db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=ylb_db_host;dbname=ultron;port=ylb_db_port',
            'username' => 'ylb_db_username',
            'password' => 'ylb_db_password',
            'charset' => 'utf8',

            // 配置从服务器
            'slaveConfig' => [
                'username' => 'ylb_db_slave_username',
                'password' => 'ylb_db_slave_password',
                'attributes' => [
                    // use a smaller connection timeout
                    PDO::ATTR_TIMEOUT => 10,
                ],
                'charset' => 'utf8',
            ],

            // 配置从服务器组
            'slaves' => [
                ['dsn' => 'mysql:host=ylb_db_slave_host;dbname=ultron;port=ylb_db_slave_port'],
            ],

        ],
        'hlc_db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=hlc_db_host;dbname=ultron;port=hlc_db_port',
            'username' => 'hlc_db_username',
            'password' => 'hlc_db_password',
            'charset' => 'utf8',

            // 配置从服务器
            'slaveConfig' => [
                'username' => 'hlc_db_slave_username',
                'password' => 'hlc_db_slave_password',
                'attributes' => [
                    // use a smaller connection timeout
                    PDO::ATTR_TIMEOUT => 10,
                ],
                'charset' => 'utf8',
            ],

            // 配置从服务器组
            'slaves' => [
                ['dsn' => 'mysql:host=hlc_db_slave_host;dbname=ultron;port=hlc_db_slave_port'],
            ],

        ],


        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'redis_host',
            'port' => 6379,
            'password'=>'redis_password',
        ],
    ],
];
