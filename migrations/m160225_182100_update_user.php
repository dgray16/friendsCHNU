<?php

use yii\db\Migration;

class m160225_182100_update_user extends Migration
{
    public function up()
    {
        $this->dropColumn('user', 'username');
        $this->addColumn('user', 'username', $this->string(). ' after id');
        $this->update('user',['username' => 'admin'], ['id' => 1]);
    }

    public function down()
    {

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
