<?php

class m161023_115212_Dict__create_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('Dict', [
            'id' => "INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            'en' => "VARCHAR(255) NOT NULL",
            'ru' => "VARCHAR(255) NOT NULL",
        ]);
    }

    public function down()
    {
        $this->dropTable('Dict');
    }
}