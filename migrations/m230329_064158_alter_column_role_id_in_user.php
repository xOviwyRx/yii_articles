<?php

use yii\db\Migration;

/**
 * Class m230329_064158_alter_column_role_id_in_user
 */
class m230329_064158_alter_column_role_id_in_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user', 'role_id', $this->integer()->notNull()->defaultValue(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('user', 'role_id', $this->integer()->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230329_064158_alter_column_role_id_in_user cannot be reverted.\n";

        return false;
    }
    */
}
