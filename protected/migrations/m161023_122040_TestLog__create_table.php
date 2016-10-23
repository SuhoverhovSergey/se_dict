<?php

class m161023_122040_TestLog__create_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('TestLog', [
            'id' => "INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            'test_id' => "INT(11) UNSIGNED NOT NULL",
            'dict_id' => "INT(11) UNSIGNED NOT NULL",
            'question_lang' => 'VARCHAR(255) NOT NULL COMMENT "EN, RU"',
            'is_correct' => 'TINYINT(1) UNSIGNED NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable('TestLog');
    }
}