<?php

namespace GeekBrains\Blog\Commands;

use GeekBrains\LevelTwo\Person\Post;
use GeekBrains\Blog\Repositories\UsersRepository\UserNotFoundException;
use GeekBrains\Blog\Repositories\UsersRepository\UsersRepositoryInterface;
use GeekBrains\Blog\User;
use GeekBrains\Blog\UUID;
use GeekBrains\Blog\Exceptions\CommandException;
use GeekBrains\Blog\Commands\Arguments;

final class CreatePostCommand
{
    public function __construct(
        private UsersRepositoryInterface $usersRepository
    ) {
    }
    // Вместо массива принимаем объект типа Arguments
    public function handle(Arguments $arguments): void
    {
        $username = $arguments->get('username');
        if ($this->userExists($username)) {
            throw new CommandException("User already exists: $username");
        }
        $this->usersRepository->save(new User(
            UUID::random(),
            $username,
            new Post($arguments->get('first_name'), $arguments->get('last_name'))
        ));
    }
    private function userExists(string $username): bool
    {
        try {
            $this->usersRepository->getByUsername($username);
        } catch (UserNotFoundException) {
            return false;
        }
        return true;
    }
}
