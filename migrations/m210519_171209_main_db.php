<?php

use yii\db\Migration;

/**
 * Class m210519_171209_main_db
 */
class m210519_171209_main_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
        ]);

        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
        ]);

        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'type' => $this->integer()->notNull(),
            'title' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'status'=> $this->text()->notNull(),
            'create_date'=> $this->dateTime()->notNull(),
        ]);

        $this->createIndex(
            'idx-task-type',
            'task',
            'type'
        );

        $this->addForeignKey(
            'fk-task-type',
            'task',
            'type',
            'type',
            'id',
            'CASCADE'
        );

        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
            'create_date'=> $this->dateTime(),
        ]);

        $this->createIndex(
            'idx-comment-task_id',
            'comment',
            'task_id'
        );

        $this->addForeignKey(
            'fk-comment-task_id',
            'comment',
            'task_id',
            'task',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('{{%type}}');

        $this->dropTable('{{%status}}');

        $this->dropForeignKey(
            'fk-task-type',
            'task'
        );

        $this->dropIndex(
            'idx-task-type',
            'task'
        );
        $this->dropTable('{{%task}}');

        $this->dropForeignKey(
            'fk-comment-task_id',
            'comment'
        );

        $this->dropIndex(
            'idx-comment-task_id',
            'comment'
        );

        $this->dropTable('{{%comment}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210519_171209_main_db cannot be reverted.\n";

        return false;
    }
    */
}
