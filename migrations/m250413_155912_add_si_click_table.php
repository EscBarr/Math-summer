<?php

use yii\db\Migration;

class m250413_155912_add_si_click_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('si_click', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'time' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('si_click');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250413_155912_add_si_click_table cannot be reverted.\n";

        return false;
    }
    */
}
