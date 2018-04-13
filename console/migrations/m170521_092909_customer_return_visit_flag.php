<?php

use yii\db\Migration;

class m170521_092909_customer_return_visit_flag extends Migration
{
    const TBL_NAME = '{{%customer_return_visit_flag}}';
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment='客户回访提醒表'";
        }

        $this->createTable(self::TBL_NAME, [
            'id' => $this->primaryKey()->comment('ID'),
            'visit_id' => $this->integer()->notNull()->comment('回访ID'),
            'user_id' => $this->integer()->notNull()->defaultValue(0)->comment('操作人ID'),
            'customer_id' => $this->integer()->notNull()->comment('客户ID'),
            'customer_type' => $this->integer()->notNull()->comment('客户类型 按位存储 1:生日类；2：充值失败；4：大额提现 8: 提现失败 16:账户提空; 32:余额>2万未投资 64: 超过30天无充值 128:等级快到期'),

            'flag_at' => $this->integer()->notNull()->comment('提醒时间'),
            'flag_content' => $this->text()->notNull()->comment('提醒内容'),
            'flag_type' => $this->integer()->notNull()->comment('提醒方式,1: 站内信 2: 邮件'),

            'flag_status' => $this->smallInteger()->notNull()->defaultValue(1)->comment('提醒状态  1：未提醒  2：已提醒'),

            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);

        $this->createIndex('visit_id', self::TBL_NAME, ['visit_id']);
        $this->createIndex('user_id', self::TBL_NAME, ['user_id']);
        $this->createIndex('customer_id', self::TBL_NAME, ['customer_id']);
    }

    public function down()
    {
        echo "m170521_092909_customer_return_visit_flag  reverted.\n";

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
