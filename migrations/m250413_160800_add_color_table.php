<?php

use yii\db\Migration;

class m250413_160800_add_color_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('color', [
            'id' => $this->primaryKey(),
            'name' => $this->string(1000)->notNull(),
            'code' => $this->string(10),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('color');
       return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250413_160800_add_color_table cannot be reverted.\n";

        return false;
    }
    */
}
