<?php

use GeekBrains\Blog\UUID;

//Создаём объект подключения к SQLite
$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');
//Вставляем строку в таблицу пользователей
// $qwe = UUID::random();
$qwe = 111;
print_r($qwe);
$connection->exec(
    "INSERT INTO users (first_name, last_name, uuid) VALUES ('Ivan', 'Nikitin',$qwe)"
);
