### UMP一期项目部署文档
#### 基本环境装备
##### 程序版本
* php7.0
* mysql5.X
* nginx1.X
##### nginx配置
```
server {
    charset utf-8;
    client_max_body_size 128M;

    listen 80;

    server_name 127.0.0.1;
    root        /Users/nicc/git/ump/backend/web;
    index       index.php;

    access_log  logs/backend_access.log;
    error_log   logs/backend_error.log;

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }

    # uncomment to avoid processing of calls to non-existing static files by Yii
    #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
    #    try_files $uri =404;
    #}
    #error_page 404 /404.html;

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root/$fastcgi_script_name;
        fastcgi_index  index.php;
        fastcgi_pass   127.0.0.1:9000;
        #fastcgi_pass unix:/var/run/php5-fpm.sock;
        try_files $uri =404;
    }

    location ~ /\.(ht|svn|git) {
        deny all;
    }
}
```
以上配置根据服务器情况自行进行配置
##### 创建对应的数据库
```
CREATE DATABASE ylb_ump DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
```
##### 初始化rbac权限管理表结构
```
./yii migrate --migrationPath=@yii/rbac/migrations
```
##### 初始化用户管理表结构
```
./yii migrate –migrationPath=@mdm/admin/migrations
```
##### 初始化权限管理数据和默认测试数据
将/document/db_init.sql导入到刚刚新建的数据库中
##### 初始化UMP项目所需表
将/document/db_ump.sql导入到刚刚新建的数据库中
##### 修改数据库链接配置文件
在/common/config目录下，根据相应的数据库配置，请自行进行修改
```
<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=ylb_ump',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'ylb_user' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=ylb_user',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
        ],
        'pay' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=pay',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
        ],
        'ylb_activity' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=ylb_activity',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => [],
        ],
    ],
];
```
>登录地址 http://对应的域名或者ip/index.php

#### 后台数据处理部署执行
##### 脚本说明：
在项目根目录下，有如下可执行脚本：
1、data-sync.sh　历史数据同步脚本，只对历史指标数据进行统计，不建议单独执行．
2、real-time.sh　实时统计脚本，主要是用于平台总览的实时数据展示．
3、analyze.sh　对统计的指标数据进行二次分析，分析成平台需要展示的数据，不建议单独执行
4、run.sh　总的统计执行脚本，会将历史数据和每天的新增数据进行统计，会自动识别执行次序，不要反复执行，如果执行错误，请重新清空ｕｍｐ开头的数据库表，重新运行此脚本．不建议单纯执行此脚本．
##### 建议以linux定时任务的方式，部署脚本，如下：
编辑linux定时任务crontab -e，并在定时任务中添加如下内容：

```
0 1 * * * cd /data/webroot/ump-web/console/shell && ./run.sh -t 2017-1-1  >> /data/log/ump/sync.log 2>&1
0 */2 * * * cd /data/webroot/ump-web/console/shell && ./real-time.sh   >> /data/log/ump/realtimesync.log 2>&1

```
>定时执行时间可以进行调整，但是尽量要在凌晨去执行，因为前期要处理历史数据，所以统计时间会根据统计数据量的增涨有所增加，不要选择晚上执行，有可能统计不完历史数据而造成统计数据不完整或错误．＂/var/www/html/ump＂中的路径必须为项目根路径，所有项目脚本必须有可执行权限．

##### 然后执行service cron restart加载添加的任务．

>平台展示数据根据后台脚本统计进度，进行展示，在一段时间内不会统计出所有数据，如果数据展示不完整，请耐心等待．

