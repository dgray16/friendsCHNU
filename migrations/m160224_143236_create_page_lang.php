<?php

use yii\db\Migration;

class m160224_143236_create_page_lang extends Migration
{
    public function up()
    {
        $this->createTable('page_content', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer()->notNull(),
            'language' => $this->string(20)->notNull(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull()
        ]);

        $this->addForeignKey('fk_page_content',
            'page_content', 'page_id',
            'page', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_page_content', 'page_content');
        $this->dropTable('page_content');
    }
}
