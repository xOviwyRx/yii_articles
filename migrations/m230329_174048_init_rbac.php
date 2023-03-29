<?php

use yii\db\Migration;

/**
 * Class m230329_174048_init_rbac
 */
class m230329_174048_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $createPermission = $auth->createPermission('create');
        $createPermission->description = 'Create';
        $auth->add($createPermission);

        $readPermission = $auth->createPermission('read');
        $readPermission->description = 'Read';
        $auth->add($readPermission);

        $updatePermission = $auth->createPermission('update');
        $updatePermission->description = 'Update';
        $auth->add($updatePermission);

        $deletePermission = $auth->createPermission('delete');
        $deletePermission->description = 'Delete';
        $auth->add($deletePermission);

        $regularUser = $auth->createRole('regular_user');
        $auth->add($regularUser);
        $auth->addChild($regularUser, $readPermission);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createPermission);
        $auth->addChild($admin, $updatePermission);
        $auth->addChild($admin, $deletePermission);
        $auth->addChild($admin, $regularUser);

        $auth->assign($admin, 6);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230329_174048_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230329_174048_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
