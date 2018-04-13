<?php

use yii\db\Migration;

class m170602_153739_common_tianrun_user_config extends Migration
{
    const TBL_NAME = '{{%common_tianrun_user_config}}';
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment='天润用户配置信息表'";
        }

        $this->createTable(self::TBL_NAME, [
            'id' => $this->primaryKey()->comment('ID'),
            'product_code' => $this->string()->notNull()->defaultValue('ylb')->comment('产品编号'),
            'user_id' => $this->integer()->notNull()->defaultValue(0)->comment('系统用户ID'),
            'hot_id' => $this->string()->notNull()->comment('400热线号码;一个 400对应多个 400客服;'),
            'tianrun_id' => $this->string()->notNull()->comment('天润工号'),
            'bind_tel' => $this->string()->notNull()->comment('绑定电话'),
            'tianrun_pwd' => $this->string()->notNull()->comment('天润密码'),

            'remark' => $this->string()->notNull()->comment('备注'),

            'created_at' => $this->integer()->notNull()->defaultValue(0)->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
        ], $tableOptions);

        $this->createIndex('user_id', self::TBL_NAME, ['user_id']);
    }

    public function down()
    {
        echo "m170602_153739_common_tianrun_user_config  reverted.\n";

        if (YII_ENV_DEV) {
            $this->dropTable(self::TBL_NAME);
        }
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
