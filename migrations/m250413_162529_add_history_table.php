<?php

use yii\db\Migration;

class m250413_162529_add_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('history', [
            'id' => $this->primaryKey(),
            'score' => $this->string(100)->notNull(),
            'date_time' => $this->dateTime()->notNull(),
            'party_team_id' => $this->integer()->notNull(),
        ]);

        // index for column `party_team_id`
        $this->createIndex(
            '{{%idx-history-party_team_id}}',
            'history',
            'party_team_id'
        );

        // foreign key to table `party_team`
        $this->addForeignKey(
            '{{%fk-history-party_team_id}}',
            'history',
            'party_team_id',
            'party_team',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-history-party_team_id}}',
            'history'
        );

        // drop index
        $this->dropIndex(
            '{{%idx-history-party_team_id}}',
            'history'
        );

        // drop table
        $this->dropTable('history');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250413_162529_add_history_table cannot be reverted.\n";

        return false;
    }
    */
}
