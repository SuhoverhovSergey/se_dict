# se_dict

##Установка

Создайте новую базу данных и настройте к ней коннект. Для этого в папке `protected/config` создайте файл `db-local.php` и укажите параметры соединения с БД.

Пример содержимого `db-local.php`:

```
<?php
return [
    'username' => 'root',
    'password' => 'root',
];
```

Выполните последовательно команды:

```
bower install
```

```
php ./protected/yiic.php migrate up
```

##Запуск проекта

```
php -S localhost:9910
```