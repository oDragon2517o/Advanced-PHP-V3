<?php

use GeekBrains\LevelTwo\Person\Name;
use GeekBrains\Blog\Repositories\UsersRepository\InMemoryUsersRepository;
use GeekBrains\Blog\Repositories\UsersRepository\UserNotFoundException;
use GeekBrains\Blog\Repositories\UsersRepository\SqliteUsersRepository;
use GeekBrains\Blog\Repositories\PostsRepository\SqlitePostsRepository;
use GeekBrains\Blog\User;
use GeekBrains\Blog\Post;
use GeekBrains\Blog\UUID;
use GeekBrains\Blog\Commands\CreatePostCommand;
use GeekBrains\Blog\Exceptions\CommandException;
use GeekBrains\Blog\Exceptions\ArgumentsException;
use GeekBrains\Blog\Commands\Arguments;
use GeekBrains\Blog\Exceptions\AppException;

require_once __DIR__ . '/vendor/autoload.php';
//Создаём объект подключения к SQLite
$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');

//Создаём объект репозитория
$PostsRepository = new SqlitePostsRepository($connection);
//Добавляем в репозиторий несколько пользователей
// $PostsRepository->save(new Post(444, 444, "saasd", "asd"));
$PostsRepository->save(new Post(UUID::random(), UUID::random(), "title", "text"));

$PostsRepository->get("34c5ec09-4bd6-4b5e-a2a2-f6a6c9a263ab");
