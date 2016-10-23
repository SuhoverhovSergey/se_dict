<?php

class m161023_121543_Test__create_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('Test', [
            'id' => "INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            'user_id' => "INT(11) UNSIGNED NOT NULL",
            'is_finished' => "TINYINT(1) UNSIGNED NOT NULL DEFAULT 0"
        ]);
    }

    public function down()
    {
        $this->dropTable('Test');
    }
}