<?php

use yii\db\Migration;

class m160309_103524_create_record extends Migration
{
    public function up()
    {
        $this->createTable('record', [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->notNull(),
            'category_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey('fk_record_category_id', 'record', 'category_id', 'category', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_record_category_id', 'record');
        $this->dropTable('record');
    }
}
