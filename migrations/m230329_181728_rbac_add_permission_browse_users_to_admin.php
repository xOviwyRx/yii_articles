<?php

use yii\db\Migration;

/**
 * Class m230329_181728_rbac_add_permission_browse_users_to_admin
 */
class m230329_181728_rbac_add_permission_browse_users_to_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $browseUsersPermission = $auth->createPermission('browse_users');
        $browseUsersPermission->description = 'Browsing of users';
        $auth->add($browseUsersPermission);
        $admin = $auth->getRole('admin');
        $auth->addChild($admin, $browseUsersPermission);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230329_181728_rbac_add_permission_browse_users_to_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230329_181728_rbac_add_permission_browse_users_to_admin cannot be reverted.\n";

        return false;
    }
    */
}
