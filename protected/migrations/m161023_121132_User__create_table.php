<?php

class m161023_121132_User__create_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('User', [
            'id' => "INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            'name' => "VARCHAR(255) NOT NULL UNIQUE",
            'score' => "SMALLINT UNSIGNED NOT NULL DEFAULT 0",
        ]);
    }

    public function down()
    {
        $this->dropTable('User');
    }
}