<?php

use yii\db\Migration;

class m160224_182526_update_page extends Migration
{
    public function up()
    {
        $this->addColumn('{{%page}}', 'slug', $this->string()->notNull(). ' after id');
    }

    public function down()
    {
        echo "m160224_182526_update_page cannot be reverted.\n";

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
