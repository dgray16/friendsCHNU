<?php

use yii\db\Migration;

class m160225_175830_update_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'avatar', $this->string().' after email');
    }

    public function down()
    {
        echo "m160225_175830_update_user cannot be reverted.\n";

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
