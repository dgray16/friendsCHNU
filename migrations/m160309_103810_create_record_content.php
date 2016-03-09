<?php

use yii\db\Migration;

class m160309_103810_create_record_content extends Migration
{
    public function up()
    {
        $this->createTable('record_content', [
            'id' => $this->primaryKey(),
            'record_id' => $this->integer()->notNull(),
            'language' => $this->string(20)->notNull(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull()
        ]);

        $this->addForeignKey('fk_record_content_record_id',
            'record_content', 'record_id',
            'record', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_record_content_record_id', 'record_content');
        $this->dropTable('record_content');
    }
}
