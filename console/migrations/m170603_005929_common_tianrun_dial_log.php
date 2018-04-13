<?php

use yii\db\Migration;

class m170603_005929_common_tianrun_dial_log extends Migration
{
    const TBL_NAME = '{{%common_tianrun_dial_log}}';
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment='天润拨号日志表'";
        }

        $this->createTable(self::TBL_NAME, [
            'id' => $this->primaryKey()->comment('ID'),
            'product_code' => $this->string()->notNull()->defaultValue('ylb')->comment('产品编号'),
            'user_id' => $this->integer()->notNull()->defaultValue(0)->comment('系统用户ID'),
            'tianrun_id' => $this->string()->notNull()->comment('天润工号'),

            'unique_id' => $this->integer()->notNull()->comment('外呼返回的一通电话的唯一标示'),

            'customer_id' => $this->integer()->notNull()->comment('客户ID'),
            'customer_tel' => $this->string()->notNull()->comment('客户电话'),

            'dial_at' => $this->integer()->notNull()->defaultValue(0)->comment('发起外呼时间'),
            'dial_flag' => $this->smallInteger()->notNull()->defaultValue(0)->comment('返回状态'),

            'remark' => $this->string()->notNull()->comment('备注'),

            'created_at' => $this->integer()->notNull()->defaultValue(0)->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
        ], $tableOptions);

        $this->createIndex('user_id', self::TBL_NAME, ['user_id']);
    }

    public function down()
    {
        echo "m170603_005929_common_tianrun_dial_log  reverted.\n";

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
