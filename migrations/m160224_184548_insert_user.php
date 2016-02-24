<?php

use yii\db\Migration;

class m160224_184548_insert_user extends Migration
{
    public function up()
    {
        $this->insert('user', [
            'username' => 'admin',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'email' => 'novoseletskiyserhiy@gmail.com',
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    public function down()
    {
        echo "m160224_184548_insert_user cannot be reverted.\n";

        return false;
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
