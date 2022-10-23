<?php

namespace GeekBrains\Blog\UnitTests\Commands;

use GeekBrains\Blog\Commands\Arguments;
use GeekBrains\Blog\Commands\CommandException;
use GeekBrains\Blog\Commands\CreateUserCommand;
use PHPUnit\Framework\TestCase;

class CreateUserCommandTest extends TestCase
{
    // Проверяем, что команда создания пользователя бросает исключение,
    // если пользователь с таким именем уже существует
    public function testItThrowsAnExceptionWhenUserAlreadyExists(): void
    {
        // Создаём объект команды
        // У команды одна зависимость - UsersRepositoryInterface
        $command = new CreateUserCommand(
            // здесь должна быть реализация UsersRepositoryInterface
        );
        // Описываем тип ожидаемого исключения
        $this->expectException(CommandException::class);
        // и его сообщение
        $this->expectExceptionMessage('User already exists: Ivan');
        // Запускаем команду с аргументами
        $command->handle(new Arguments(['username' => 'Ivan']));
    }
}
