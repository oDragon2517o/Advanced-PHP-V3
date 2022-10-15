<?php


use GeekBrains\Blog\Name;
use GeekBrains\Blog\Repositories\UsersRepository\InMemoryUsersRepository;
use GeekBrains\Blog\Repositories\UsersRepository\UserNotFoundException;
use GeekBrains\Blog\User;

require_once __DIR__ . '/vendor/autoload.php';
//Создаём объект репозитория
$usersRepository = new InMemoryUsersRepository();
//Добавляем в репозиторий несколько пользователей
$usersRepository->save(new User(123, new Name('Ivan', 'Nikitin')));
$usersRepository->save(new User(234, new Name('Anna', 'Petrova')));
try {
    //Загружаем пользователя из репозитория
    $user = $usersRepository->get(333);
    print $user->name();
} catch (UserNotFoundException $e) {
    print $e->getMessage();
}
