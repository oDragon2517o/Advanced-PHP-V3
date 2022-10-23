<?php

namespace GeekBrains\Blog\UnitTests\Commands;

use GeekBrains\Blog\Commands\Arguments;
use GeekBrains\Blog\Commands\CommandException;
use GeekBrains\Blog\Commands\CreateUserCommand;
use GeekBrains\Blog\Repositories\UsersRepository\DummyUsersRepository;
use PHPUnit\Framework\TestCase;

class CreateUserCommandTest extends TestCase
{
    public function testItThrowsAnExceptionWhenUserAlreadyExists(): void
    {
        $command = new CreateUserCommand(
            // Передаём наш стаб в качестве реализации UsersRepositoryInterface
            new DummyUsersRepository()
        );
        $this->expectException(CommandException::class);
        $this->expectExceptionMessage('User already exists: Ivan');
        $command->handle(new Arguments(['username' => 'Ivan']));
    }
}
