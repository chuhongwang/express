<?php
return [
    'api_key' => [
        'bwaccountlog_key'=>'api_bwaccountlog_key',//资金记录key
        'JxRepay_key'=>'api_JxRepay_key',//投资记录-近期回款key
        'corpInfo_key'=>'business_corpInfo_key',//企业开户Key
    ],

    'api'=>[
        'address'=>'api_address',
        'accountLogQuery'=>'api_accountLogQuery',//资金记录接口
        'JxRepayQuery'=>'api_JxRepayQuery',//投资记录-近期回款接口
    ],

    'api_corpInfo'=>[
        'address'=>'business_address',
        'corpInfoQuery'=>'business_corpInfoQuery',//企业用户信息查询
        'corpInfoCreate'=>'business_corpInfoCreate',//企业用户创建账号
    ],

    'oss' =>[
        'accessKeyId'=>'oss_accessKeyId',
        'accessKeySecret'=>'oss_accessKeySecret',
        'bucket' => 'oss_bucket',
        'endPoint' => 'oss_endPoint',
    ],
];
