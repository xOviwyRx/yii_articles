<?php

use yii\db\Migration;

/**
 * Class m230329_155549_add_foreign_key_created_by_to_article
 */
class m230329_155549_add_foreign_key_created_by_to_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-article-created_by',
            'article',
            'created_by',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m230329_155549_add_foreign_key_created_by_to_article cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230329_155549_add_foreign_key_created_by_to_article cannot be reverted.\n";

        return false;
    }
    */
}
