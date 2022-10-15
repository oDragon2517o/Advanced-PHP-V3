<?php

// GeekBrains\LevelTwo\Person
// use GeekBrains\Blog\Name;
use GeekBrains\LevelTwo\Person\Name;
use GeekBrains\Blog\Repositories\UsersRepository\InMemoryUsersRepository;
use GeekBrains\Blog\Repositories\UsersRepository\UserNotFoundException;
use GeekBrains\Blog\User;

require_once __DIR__ . '/vendor/autoload.php';


// $user = new User('Ivan');
// if ($user === 666) {
//     //Что-то пошло не так
// } else {
//     // А здесь всё в порядке
// }


//Создаём объект репозитория
$usersRepository = new InMemoryUsersRepository();

//Добавляем в репозиторий несколько пользователей
$usersRepository->save(new User(123, new Name('Ivan', 'Nikitin')));
$usersRepository->save(new User(234, new Name('Anna', 'Petrova')));

try {
    //Загружаем пользователя из репозитория
    $user = $usersRepository->get(234);
    print $user->getName();
} catch (UserNotFoundException $e) {
    print $e->getMessage();
}


// // use the factory to create a Faker\Generator instance
// $faker = Faker\Factory::create();
// // generate data by calling methods
// echo $faker->name();
// // 'Vince Sporer'
// echo $faker->email();
// // 'walter.sophia@hotmail.com'
// echo $faker->text();
// // 'Numquam ut mollitia at consequuntur inventore dolorem.'

// for ($i = 0; $i < 3; $i++) {
//     echo $faker->name() . "\n";
// }
