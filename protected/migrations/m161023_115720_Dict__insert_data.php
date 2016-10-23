<?php

class m161023_115720_Dict__insert_data extends CDbMigration
{
    public function up()
    {
        $this->insertMultiple('Dict', [
            ['en' => 'apple', 'ru' => 'яблоко'],
            ['en' => 'pear', 'ru' => 'персик'],
            ['en' => 'orange', 'ru' => 'апельсин'],
            ['en' => 'grape', 'ru' => 'виноград'],
            ['en' => 'lemon', 'ru' => 'лимон'],
            ['en' => 'pineapple', 'ru' => 'ананас'],
            ['en' => 'watermelon', 'ru' => 'арбуз'],
            ['en' => 'coconut', 'ru' => 'кокос'],
            ['en' => 'banana', 'ru' => 'банан'],
            ['en' => 'pomelo', 'ru' => 'помело'],
            ['en' => 'strawberry', 'ru' => 'клубника'],
            ['en' => 'raspberry', 'ru' => 'малина'],
            ['en' => 'melon', 'ru' => 'дыня'],
            ['en' => 'apricot', 'ru' => 'абрикос'],
            ['en' => 'mango', 'ru' => 'манго'],
            ['en' => 'plum', 'ru' => 'слива'],
            ['en' => 'pomegranate', 'ru' => 'гранат'],
            ['en' => 'cherry', 'ru' => 'вишня'],
        ]);
    }

    public function down()
    {
        $this->delete('Dict');
    }
}