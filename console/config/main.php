<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'ump-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'categories' => ['esign'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/esign' . date('Ymd')
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'dataSync' => [
            'class' => 'console\components\DataSync',

        ],
        'analyze' => [
            'class' => 'console\components\Analyze',
        ],
        'realTimeAnalyze' => [
            'class' => 'console\components\RealTimeAnalyze',

        ],
        'rollBack' => [
            'class' => 'console\components\RollBack',

        ],
        //平台债权
        'platformDebt' => [
            'class' => 'console\components\PlatformDebt',

        ],
        //项目明细
        'loanProjectDetail' => [
            'class' => 'console\components\LoanProjectDetail',

        ],

        //返本派息
        'payoutPrincipalInterest' => [
            'class' => 'console\components\PayoutPrincipalInterest',
        ],
        //平台当日数据
        'platformTodayData' => [
            'class' => 'console\components\PlatformTodayData',

        ],
        //合作数据操作类
        'partners' => [
            'class' => 'console\components\Partners',

        ],

        //财务对账-债权数据实时查询的数据操作类
        'debt' => [
            'class' => 'console\components\Debt',

        ],

        //平台数据
        'dashboards' => [
            'class' => 'console\components\Dashboards',

        ],
        //未来一个月应付款项
        'futurePay' => [
            'class' => 'console\components\FuturePay',

        ],
        //满反券使用成本
        'fullBack' => [
            'class' => 'console\components\FullBack',

        ],
        //满反券使用成本
        'increment' => [
            'class' => 'console\components\Increment',

        ],
        //满反券使用成本
        'experience' => [
            'class' => 'console\components\Experience',

        ],
        //月月升增值派息
        'month' => [
            'class' => 'console\components\Month',
        ],
        //季季发升增值派息
        'query' => [
            'class' => 'console\components\Query',

        ],


        //用户消化
        'userDigest' => [
            'class' => 'console\components\UserDigest',

        ],

        //上线邮件告警
        'debtOnlineAlarmEmail' => [
            'class' => 'console\components\DebtOnlineAlarmEmail',

        ],
        //测试自动上线
        'testAuto' => [
            'class' => 'console\components\TestAuto',

        ],

        //积分
        'acUsersInteger' => [
            'class' => 'console\components\AcUsersInteger',

        ],

        //债转
        'accountLog' => [
            'class' => 'console\components\AccountLog',

        ],
        //债转
        'leftMoney' => [
            'class' => 'console\components\LeftMoney',

        ],
        //尽调数据
        'tuneData' => [
            'class' => 'console\components\TuneData',

        ],
        //尽调数据
        'makeRiskFile' => [
            'class' => 'console\components\MakeRiskFile',

        ],

        //上线债权
        'onlineDebt' => [
            'class' => 'console\components\OnlineDebt',
        ],

        //尽调数据-用户数据,平台交易相关统计
        'userData' => [
            'class' => 'console\components\UserData',

        ],
        //尽调数据-未到期项目还本派息
        'notDueData' => [
            'class' => 'console\components\NotDueData',
        ],

        //尽调数据-在贷项目信息
        'inLoanData' => [
            'class' => 'console\components\InLoanData',

        ],

        //尽调数据-前十大
        'topTenData' => [
            'class' => 'console\components\TopTenData',
        ],
        //用户统计明细
        'svipAndVipUserData' => [
            'class' => 'console\components\SvipAndVipUserData',

        ],
        //自动债权上线
        'debtOnline' => [
            'class' => 'console\components\Debt',
        ],
        //月度充值投资变现及预计
        'monthlyRecharge' => [
            'class' => 'console\components\MonthlyRecharge',
        ],

        //月度充值投资变现及预计
        'channel'=>[
            'class' => 'console\components\Channel',
        ],

        //合规数据
        'pigeonhole' => [
            'class' => 'console\components\Pigeonhole',
        ],
        //借款人开户数据补全脚本
        'borrowerBind' => [
            'class' => 'console\components\BorrowerBind',
        ],
        //一次性服务费修复
        'debtOneTimeFee'=>[
            'class' => 'console\components\DebtOneTimeFee',
        ],
        //用户信息补全
        'userInfoBind'=>[
            'class' => 'console\components\UserInfoBind',
        ],
        //检查宝券
        'couponCheck'=>[
            'class' => 'console\components\CouponCheck',
        ],

    ],
    'params' => $params,

];
