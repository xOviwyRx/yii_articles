<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230328_163837_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(55)->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string()->notNull(),
            'access_token' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
