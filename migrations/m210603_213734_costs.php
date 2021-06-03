<?php

use yii\db\Migration;

/**
 * Class m210603_213734_costs
 */
class m210603_213734_costs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cost}}', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
            'cost'=> $this->decimal()
        ]);

        $this->createIndex(
            'idx-cost-task_id',
            'cost',
            'task_id'
        );

        $this->addForeignKey(
            'fk-cost-task_id',
            'cost',
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
        echo "m210603_213734_costs cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210603_213734_costs cannot be reverted.\n";

        return false;
    }
    */
}
