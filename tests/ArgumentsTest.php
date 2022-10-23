<?php

namespace GeekBrains\Blog\UnitTests\Commands;

use GeekBrains\Blog\Commands\Arguments;
use PHPUnit\Framework\TestCase;

class ArgumentsTest extends TestCase
{
    public function testItReturnsArgumentsValueByName(): void
    {
        // Подготовка
        $arguments = new Arguments(['some_key' => 'some_value']);
        // Действие
        $value = $arguments->get('some_key');
        // Проверка
        $this->assertEquals('some_value', $value);
    }

    public function testItReturnsValuesAsStrings(): void
    {
        // Создаём объект с числом в качестве значения аргумента
        $arguments = new Arguments(['some_key' => 123]);
        $value = $arguments->get('some_key');
        // Проверяем, что число стало строкой
        $this->assertEquals('123', $value);
    }
    public function argumentsProvider(): iterable
    {
        return [
            ['some_string', 'some_string'], // Тестовый набор
            // Первое значение будет передано
            // в тест первым аргументом,
            // второе значение будет передано
            // в тест вторым аргументом
            [' some_string', 'some_string'], // Тестовый набор №2
            [' some_string ', 'some_string'],
            [123, '123'],
            [12.3, '12.3'],
        ];
    }
    /**
     * @dataProvider argumentsProvider
     */

    public function testItConvertsArgumentsToStrings(
        $inputValue,
        $expectedValue
    ): void {
        // Подставляем первое значение из тестового набора
        $arguments = new Arguments(['some_key' => $inputValue]);
        $value = $arguments->get('some_key');
        // Сверяем со вторым значением из тестового набора
        $this->assertEquals($expectedValue, $value);
    }
}
