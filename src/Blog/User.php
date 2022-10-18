<?php

namespace GeekBrains\Blog;

use GeekBrains\LevelTwo\Person\Name;

class User
{
    // private $id = 333;
    // private $name;
    // private $username;
    // private Name $username;

    public function __construct(
        private UUID $uuid,
        private string $username,
        private Name $name
    ) {
    }



    public function id(): int
    {
        return $this->id;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function getName()
    {
        return $this->name;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function uuid(): UUID
    {
        return $this->uuid;
    }
    public function username(): string
    {
        return $this->username;
    }
}
