<?php

use yii\db\Migration;

class m170520_023146_customer_return_visit extends Migration
{

    const TBL_NAME = '{{%customer_return_visit}}';
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment='客户回访记录表'";
        }

        $this->createTable(self::TBL_NAME, [
            'visit_id' => $this->primaryKey()->comment('ID'),
            'product_code' => $this->string(5)->notNull()->comment('产品线代码 ylb:D0301 ；hlc:D0302'),
            'customer_id' => $this->integer()->notNull()->comment('客户ID'),
            'customer_type' => $this->integer()->notNull()->comment('客户类型 按位存储 1:生日类；2：充值失败；4：大额提现 8: 提现失败 16:账户提空; 32:余额>2万未投资 64: 超过30天无充值 128:等级快到期'),
            'user_id' => $this->integer()->notNull()->defaultValue(0)->comment('回访人ID'),
            'remark' => $this->text()->notNull()->comment('备注'),

            'visit_status' => $this->smallInteger()->notNull()->defaultValue(1)->comment('回访状态  1：未回访   2：正在回访  3：结束回访'),
            'start_visit_at' => $this->integer()->notNull()->defaultValue(0)->comment('回访开始时间'),
            'stop_visit_at' => $this->integer()->notNull()->defaultValue(0)->comment('回访结束时间'),
            'visit_content' => $this->text()->notNull()->comment('回访内容'),

            'assign_status' => $this->smallInteger()->notNull()->defaultValue(1)->comment('分配状态  1：未分配   2：已分配'),
            'assign_at' => $this->integer()->notNull()->comment('分配时间'),

            'operator_id' => $this->integer()->notNull()->defaultValue(0)->comment('操作人ID : 0 为系统'),

            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);

        $this->createIndex('customer_id', self::TBL_NAME, ['customer_id']);
        $this->createIndex('user_id', self::TBL_NAME, ['user_id']);
    }

    public function down()
    {
        echo "m170520_023146_customer_return_visit be reverted.\n";

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
