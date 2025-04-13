<?php

use yii\db\Migration;

class m250413_164015_add_personal_offset_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('personal_offset', [
            'id' => $this->primaryKey(),
            'name' => $this->string(1000)->notNull(),
        ]);

        // Добавляем индекс для поля name
        $this->createIndex(
            'idx-personal_offset-name',
            'personal_offset',
            'name'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаляем таблицу
        $this->dropTable('personal_offset');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250413_164015_add_personal_offset_table cannot be reverted.\n";

        return false;
    }
    */
}
