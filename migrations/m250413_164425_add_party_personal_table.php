<?php

use yii\db\Migration;

class m250413_164425_add_party_personal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('party_personal', [
            'id' => $this->primaryKey(),
            'personal_offset_id' => $this->integer()->notNull(),
            'total_score' => $this->integer()->notNull()->defaultValue(0),
            'secondname' => $this->string(1000)->notNull(),
            'firstname' => $this->string(1000)->notNull(),
            'patronymic' => $this->string(1000)->null(),
        ]);

        // Добавляем внешний ключ
        $this->addForeignKey(
            'fk-party_personal-personal_offset_id',
            'party_personal',
            'personal_offset_id',
            'personal_offset',
            'id',
            'CASCADE'
        );

        // Добавляем индексы
        $this->createIndex(
            'idx-party_personal-personal_offset_id',
            'party_personal',
            'personal_offset_id'
        );

        $this->createIndex(
            'idx-party_personal-total_score',
            'party_personal',
            'total_score'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаляем внешние ключи
        $this->dropForeignKey(
            'fk-party_personal-personal_offset_id',
            'party_personal'
        );

        // Удаляем таблицу
        $this->dropTable('party_personal');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250413_164425_add_party_personal_table cannot be reverted.\n";

        return false;
    }
    */
}
