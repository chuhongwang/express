<?php
use \kartik\mpdf\Pdf;
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter'=>[
            'defaultTimeZone'=>'Asia/Shanghai'  //避免格式化后的时间显示不正确
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => [],
        ],
        'remindMailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' =>false,
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtpdm.aliyun.com',
                'host' => 'smtp.mxhichina.com',
//                'port' => 25,
                'username' => 'umpsystem@ylb.net',
                'password' => 'y1l2b3@1234',
                'port' => '465',
                'encryption' => 'ssl',
            ],
            //发送的邮件信息配置
            'messageConfig' => [
                'charset' => 'utf-8',
                'from' => ['UMPsystem@ylb.net' => 'UMP']
            ],
        ],
        'grid' => [
            'class' => 'common\components\GridHelper'
        ],
        'Aliyunoss' => [
            'class' => 'common\components\Aliyunoss',
        ],
        'AliyunossHeGui' => [
            'class' => 'common\components\AliyunossHeGui',
        ],
        'ApiData' => [
            'class' => 'common\components\ApiData',
        ],
    ],
];
