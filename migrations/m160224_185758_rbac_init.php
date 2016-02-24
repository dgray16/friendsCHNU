<?php

use yii\db\Migration;

class m160224_185758_rbac_init extends Migration
{
    public function up()
    {
        require Yii::getAlias('@yii/rbac/migrations/') . 'm140506_102106_rbac_init.php';

        $migration = new m140506_102106_rbac_init();
        $migration->up();

        $roleAdmin = Yii::$app->authManager->createRole('admin');
        Yii::$app->authManager->add($roleAdmin);
        $user = \app\models\user\User::findOne(['username' => 'admin']);

        Yii::$app->authManager->assign($roleAdmin, $user->getId());

    }

    public function down()
    {
        require Yii::getAlias('@yii/rbac/migrations/') . 'm140506_102106_rbac_init.php';

        $migration = new m140506_102106_rbac_init();
        $migration->down();
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
