UMP项目框架约定
===============================


### ChangeLog 版本修改
最新版本时间为: [2017-04-09](#)

详情见 [CHANGELOG.md](CHANGELOG.md) 中的內容.

界面示例： 

	/dashboards/index  首页示例
	/dashboards/day-report 列表页示例
	
## 内部服务器启动

php ./yii serve --docroot=@backend/web --port=你想要使用的端口

## 定时任务说明

详情见 [CONSOLE.md](document/CONSOLE.md) 中的內容.
## 模块约定

一个控制器对应界面上的一个大模块

## 项目初始化

在项目目录下执行 ./init 开发时选择 Developer
我们 ump 项目的主要代码放在 backend

修改 backend/config/main-local.php 文件
在 $config['modules']['gii'] = [ ] 数组中添加参数,最终结果如下:

```
 $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'model'=> [
                'class' => 'yii\gii\generators\model\Generator',
                'ns'=> 'common\models',
                'templates'=> [
                    'backend'=>'@common/gii/model/backend'
                ]
            ],
            'crud'=> [
                'class' => 'common\gii\crud\Generator',
                'templates'=> [
                    'backend'=>'@common/gii/crud/backend'
                ],
            ]
        ]
    ];
```

在生成代码时需要选择对应的模板

## RBAC 权限管理初始化

创建数据库 

CREATE DATABASE ylb_ump DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

初始化rbac权限管理表结构

    ./yii migrate --migrationPath=@yii/rbac/migrations

初始化用户管理表结构

    ./yii migrate --migrationPath=@mdm/admin/migrations

初始化权限管理数据和默认测试数据
    
    执行SQL /document/db_init.sql 
    
    测试数据登录用户名为 admin  密码为 123456
    

 ** 数据配置统一放 /common/config/main.php **


## 代码生成
使用 gii
帮助文档：http://www.yiibai.com/yii2/start-gii.html


选择backend下的模板


### console 控制器生成

以TestController为例:
在Controller Generator 输入:

console\controllers\TestController

输入想要生成的action:

index,hello

忽略 view 的生成

点击生成,

在项目根目录下输入 ./yii 可以看到我们新生成的 action 变成了可执行的命令:

- test
    test/hello
    test/index (default)
    
在命令行下输入:

./yii test/hello





## 数据库变更
使用 migrate
帮助文档：http://www.yiibai.com/yii2/yii_database_migration.html


表结构管理使用 yii2 migrate，使用示例如下：

关键命令

创建migrate

    yii migrate/create [名称]
    
执行migrate升级

    yii migrate
    
执行migrate降级

    yii migrate/down    
    
创建新表

执行创建migrate命令后，项目文件夹下migrations中会多出m170119093917[名称].php的文件，文件名称可能不同，但是结构是相同的，打开该php文件，内容如下

```
<?php
use yii\db\Migration;

class m170119_093917_name_20 extends Migration
{
     public function up()
     {
          $tableName = 't_category';
          $this->createTable($tableName, [
               'id' => $this->primaryKey(),
               'name' => $this->string(10)->notNull()->unique()->comment('标识'),
               'title' => $this->string(6)->notNull()->comment('名称'),
               'count' => $this->integer()->defaultValue(0)->notNull()->comment('入驻数量')
          ]);
     }

     public function down()
     {
          echo "m170119_093917_name_20 cannot be reverted.\n";
          return false;
     }

     /*
     // Use safeUp/safeDown to run migration code within a transaction
     public function safeUp()
     {
     }

     public function safeDown()
     {
     }
     */
}
```

如果需要支持降级的话在down方法中写逻辑返回true即可。

以下代码演示Migration操作，不再新建migrate，执行使用本php文件即可

添加字段
    <?php
        $this->addColumn('t_category','sort',$this->integer()->defaultValue(0)->notNull()->comment('排序'));

添加索引
    <?php    
    $this->createIndex('sort','t_category',['sort']);

添加唯一索引

    <?php
    $this->createIndex('sort','t_category',['sort'],true);

更新字段

    <?php
        $this->alterColumn('t_category','sort',$this->smallInteger()->defaultValue(0)->notNull()->comment('排序'));

删除字段
    
    <?php
        $this->dropColumn('t_category','sort’);

删除表

    <?php    
    $this->dropTable('t_category');


## 代码生成
使用 gii
帮助文档：http://www.yiibai.com/yii2/start-gii.html

界面的模板还没有开发……




## 文件存储结构
-------------------

```
common                   公共配置和公共数据模型
    config/              包括公共配置
    mail/                邮件信息
    models/              前后端都需要的模型文件
    components/                 公共组件
console                  定时任务 数据定义
    config/              控制台配置
    controllers/         控制台命令
    migrations/          数据生成
    models/              控制台专用模型
    runtime/             运行时生成的文件
backend                  UMP管理控制台
    assets/              包含应用程序的JavaScript和CSS等
    config/              后端配置
    controllers/         控制器
    models/              后端特有模型类
    runtime/             运行时生成的文件
    views/               管理后台视图
    web/                 静态资源和内容
frontend                  前台页面(暂时用不上)
    assets/              包含应用程序的JavaScript和CSS配置信息
    config/              前端配置
    controllers/         前端控制器
    models/              前端特有的模型和form
    runtime/             运行时生成的文件
    views/               视图
    web/                 静态资源和内容
    widgets/             前端的
vendor/                  第三方插件
   ```


##配置虚拟主机 

以nginx的虚拟主机为例进行配置

```
server {
    charset utf-8;
    client_max_body_size 128M;

    listen 81;

    server_name 192.168.207.128;
    root        /var/www/html/yii2/yii2_rbac_admin/backend/web;
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
