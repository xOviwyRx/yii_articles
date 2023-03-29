<?php

use yii\db\Migration;

/**
 * Class m230329_142545_alter_column_category_id_to_article
 */
class m230329_142545_alter_column_category_id_in_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('article', 'category_id', $this->integer()->notNull()->defaultValue(5));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('article', 'category_id', $this->integer()->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230329_142545_alter_column_category_id_to_article cannot be reverted.\n";

        return false;
    }
    */
}
