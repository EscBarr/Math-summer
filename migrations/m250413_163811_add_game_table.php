<?php

use yii\db\Migration;

class m250413_163811_add_game_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('game', [
            'id' => $this->primaryKey(),
            'first_squad_id' => $this->integer()->notNull(),
            'second_squad_id' => $this->integer()->notNull(),
            'tournament_id' => $this->integer()->notNull(),
            'tour' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
        ]);

        // Добавляем внешние ключи
        $this->addForeignKey(
            'fk-game-first_squad_id',
            'game',
            'first_squad_id',
            'squad',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-game-second_squad_id',
            'game',
            'second_squad_id',
            'squad',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-game-tournament_id',
            'game',
            'tournament_id',
            'tournament',
            'id',
            'CASCADE'
        );

        // Добавляем индексы
        $this->createIndex(
            'idx-game-tournament_id',
            'game',
            'tournament_id'
        );

        $this->createIndex(
            'idx-game-status',
            'game',
            'status'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаляем внешние ключи
        $this->dropForeignKey('fk-game-first_squad_id', 'game');
        $this->dropForeignKey('fk-game-second_squad_id', 'game');
        $this->dropForeignKey('fk-game-tournament_id', 'game');

        // Удаляем таблицу
        $this->dropTable('game');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250413_163811_add_game_table cannot be reverted.\n";

        return false;
    }
    */
}
