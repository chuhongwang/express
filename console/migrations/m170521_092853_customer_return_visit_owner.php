<?php

use yii\db\Migration;

class m170521_092853_customer_return_visit_owner extends Migration
{
    const TBL_NAME = '{{%customer_return_visit_owner}}';
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment='客户回访归属表'";
        }

        $this->createTable(self::TBL_NAME, [
            'id' => $this->primaryKey()->comment('ID'),
            'customer_id' => $this->integer()->notNull()->comment('客户ID'),
            'owner_id' => $this->integer()->notNull()->defaultValue(0)->comment('归属人ID'),
            'content' => $this->string()->notNull()->comment('备注'),

            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);

        $this->createIndex('customer_id', self::TBL_NAME, ['customer_id'], TRUE);
        $this->createIndex('owner_id', self::TBL_NAME, ['owner_id']);
    }

    public function down()
    {
        echo "m170521_092853_customer_return_visit_owner reverted.\n";

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
