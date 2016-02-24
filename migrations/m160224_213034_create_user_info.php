<?php

use yii\db\Migration;

class m160224_213034_create_user_info extends Migration
{
    public function up()
    {
        $this->createTable('user_info', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'sur_name' => $this->string()->notNull(),
            'birth_day' => $this->date()->notNull(),
            'telephone' => $this->string()->notNull(),
            'entry_year' => $this->integer()->notNull(),
            'graduation_year' => $this->integer()->notNull(),
            'description' => $this->text()
        ]);

        $this->addForeignKey('fk_user_info_user_id',
            'user_info', 'user_id',
            'user', 'id', 'CASCADE', 'CASCADE');

        $this->insert('user_info', [
           'user_id' => 1,
            'first_name' => 'Адміністратор',
            'sur_name' => 'Адміністратор',
            'last_name' => 'Адміністратор',
            'birth_day' => '0000-00-00',
            'telephone' => ' ',
            'entry_year' => 2015,
            'graduation_year' => 2015,
        ]);
    }

    public function down()
    {
        $this->dropForeignKey('fk_user_info_user_id', 'user_info');
        $this->dropTable('user_info');
    }
}
