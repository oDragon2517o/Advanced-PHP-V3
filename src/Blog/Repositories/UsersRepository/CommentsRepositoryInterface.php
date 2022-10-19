<?php

namespace GeekBrains\Blog\Repositories\UsersRepository;

use GeekBrains\Blog\Comments;
use GeekBrains\Blog\UUID;

interface UsersRepositoryInterface
{
    public function save(Comments $user): void;
    public function get(UUID $uuid): Comments;
    // Добавили метод
    // public function getByUsername(string $username): Post;
}
