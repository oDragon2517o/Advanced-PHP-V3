<?php

namespace GeekBrains\Blog\Repositories\PostsRepository;

use GeekBrains\Blog\Post;
use GeekBrains\Blog\User;
// use GeekBrains\Blog\Name;
use GeekBrains\LevelTwo\Person\Name;
use GeekBrains\Blog\UUID;
// use GeekBrains\Blog\Repositories\UsersRepository\UsersRepositoryInterface;
use PDO;
use PDOStatement;
// use GeekBrains\Blog\Repositories\interface\UsersRepositoryInterface;

class SqlitePostsRepository implements PostsRepositoryInterface
{
    public function __construct(
        private PDO $connection
    ) {
        // print_r($connection);
    }
    public function save(Post $post): void
    {
        $statement = $this->connection->prepare(
            'INSERT INTO posts (uuid, author_uuid, title, "text")
        VALUES (:uuid, :author_uuid, :title, :txt)'
        );
        // print_r($statement);
        $statement->execute([
            ':uuid' => $post->uuid(),
            ':author_uuid' => $post->author_uuid(),
            ':title' => $post->title(),
            ':txt' => $post->text()
            // ':last_name' => $user->name()->last(),
            // Это работает, потому что класс UUID
            // имеет магический метод __toString(),
            // который вызывается, когда объект
            // приводится к строке с помощью (string)

        ]);
    }
    // Также добавим метод для получения
    // пользователя по его UUID
    public function get($uuid): Post
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM posts WHERE uuid = :uuid'
        );
        $statement->execute([
            ':uuid' => (string)$uuid,
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        // Бросаем исключение, если пользователь не найден
        print_r($result);

        if (false === $result) {
            throw new PostsNotFoundException(
                "Cannot get post: $uuid"
            );
        }
        return new Post(
            $result['uuid'],
            $result['author_uuid'],
            $result['title'],
            $result['text'],
        );
    }
}
