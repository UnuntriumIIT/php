<?php

use yii\db\Migration;

/**
 * Class m210603_204434_comm_author
 */
class m210603_204434_comm_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comment', 'author', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210603_204434_comm_author cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210603_204434_comm_author cannot be reverted.\n";

        return false;
    }
    */
}
