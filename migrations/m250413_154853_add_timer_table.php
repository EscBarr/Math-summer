<?php

use yii\db\Migration;

class m250413_154853_add_timer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('timer', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'hours' => $this->integer(),
            'minutes' => $this->integer(),
            'seconds' => $this->integer(),
            'check_time' => $this->string(8),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('timer');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250413_154853_add_timer_table cannot be reverted.\n";

        return false;
    }
    */
}
