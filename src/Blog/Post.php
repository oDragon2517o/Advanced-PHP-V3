<?php

namespace GeekBrains\Blog;

use GeekBrains\LevelTwo\Person\Person;
use GeekBrains\LevelTwo\Person\Name;

class Post
{
    public function __construct(
        private string $uuid,
        private string $author_uuid,
        private string $title,
        private string $text
    ) {
    }
    public function __toString()
    {
        return $this->author . ' пишет: ' . $this->text;
    }
    public function uuid()
    {
        return $this->uuid;
    }
    public function author_uuid()
    {
        return $this->author_uuid;
    }
    public function title()
    {
        return $this->title;
    }
    public function text()
    {
        return $this->text;
    }
}
