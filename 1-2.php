<?php
require_once __DIR__ . '/vendor/autoload.php';

// use GeekBrains\advancedphp\Blog\Post;
// use GeekBrains\advancedphp\Person\Name;
// use GeekBrains\advancedphp\Person\Person;

use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Person\Name;
use GeekBrains\LevelTwo\Person\Person;


$post = new Post(
    new Person(
        new Name('Иван', 'Никитин'),
        new DateTimeImmutable()
    ),
    'Всем привет!'
);
print $post;
