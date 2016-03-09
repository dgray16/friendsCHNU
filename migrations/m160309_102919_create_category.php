<?php

use yii\db\Migration;

class m160309_102919_create_category extends Migration
{
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string()
        ]);

        $categories = [
            ['title' => 'Новини'],
            ['title' => 'Події'],
            ['title' => 'Оголошення'],
        ];

        foreach($categories as $category) {
            $this->insert('category', $category);
        }
    }

    public function down()
    {
        $this->dropTable('category');
    }
}
