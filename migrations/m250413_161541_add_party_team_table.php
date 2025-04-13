<?php

use yii\db\Migration;

class m250413_161541_add_party_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('party_team', [
            'id' => $this->primaryKey(),
            'team_id' => $this->integer(),
            'color_id' => $this->integer(),
            'team_name' => $this->string(1000),
            'total_score' => $this->integer()->defaultValue(0),
        ]);

        // creates index for column `team_id`
        $this->createIndex(
            '{{%idx-party_team-team_id}}',
            'party_team',
            'team_id'
        );

        // add foreign key for table `team`
        $this->addForeignKey(
            '{{%fk-party_team-team_id}}',
            'party_team',
            'team_id',
            'team',
            'id',
            'CASCADE'
        );

        // creates index for column `color_id`
        $this->createIndex(
            '{{%idx-party_team-color_id}}',
            'party_team',
            'color_id'
        );

        // add foreign key for table `color`
        $this->addForeignKey(
            '{{%fk-party_team-color_id}}',
            'party_team',
            'color_id',
            'color',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-party_team-team_id}}',
            'party_team'
        );

        // drops index for column `team_id`
        $this->dropIndex(
            '{{%idx-party_team-team_id}}',
            'party_team'
        );

        // drops foreign key for table `color`
        $this->dropForeignKey(
            '{{%fk-party_team-color_id}}',
            'party_team'
        );

        // drops index for column `color_id`
        $this->dropIndex(
            '{{%idx-party_team-color_id}}',
            'party_team'
        );

        $this->dropTable('party_team');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250413_161541_add_party_team_table cannot be reverted.\n";

        return false;
    }
    */
}
