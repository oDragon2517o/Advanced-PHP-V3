<?php

namespace GeekBrains\Blog;


class User
{
    private $id = 333;
    private $name;
    // private $username;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }


    public function getId(): int
    {
        return $this->id;
    }



    function makeUser($username): ?User
    {
        if (empty($username)) {
            return null;
        }
        return new User($username);
    }
}
