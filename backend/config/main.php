<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'ump',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'defaultRoute' => 'site',
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
//            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
            'controllerMap' => [
//                'user' => [
//                    'class' => 'mdm\admin\controllers\UserController',
//                    'userClassName' => 'common\models\User',
//                ],
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'common\models\User',
                    'idField' => 'id',
                    'usernameField' => 'username',
                    'fullnameField' => 'username',
                ],
            ],
            'menus' => [
                'assignment' => [
//                    'label' => 'Grand Access' // change label
                ],
                'route' => null, // disable menu route
            ],
        ]
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'gii/*',
            'query/*',
            'admin/*',
            'debug/*',
            'add/index',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
//            'loginUrl' => ['admin/user/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'ump-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning','info'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'categories' => ['time_count'],
                    'logFile' => '@app/runtime/logs/Mylog/requests.log',
                    'maxFileSize' => 1024 * 2,
                    'maxLogFiles' => 20,
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'analyze' => [
            'class' => 'console\components\Analyze',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
